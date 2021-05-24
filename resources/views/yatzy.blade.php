<?php

declare(strict_types=1);

?>
@extends('layout')

@section('content')


<nav>
    <ul class="breadcrumb">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        Yatzy
                    </li>
    </ul>
</nav>


<h1>Yatzy - A simple Yatzy game. </h1>

<div class="flex-even-center center-800">
<div style="display: inline-block">
<form method="POST">
<fieldset class="large">
    @csrf
    @foreach (array_keys($diceValues) as $index)
        @php
            $name = "hold" . "[" . $index . "]";
        @endphp
        <div style="height: 3rem">
            <input type="checkbox" id="die-{{ $name }}" name="{{ $name }}" value="roll" style="visibility:{{ $firstRoll ? 'hidden' : 'visible' }}">
            <label for="die-{{ $name }}">&#{{ $firstRoll ? 9633 : 9855 + $diceValues[$index] }}</label>
        </div>
    @endforeach


    <p>Rolls left: {{ $rollsLeft }}</p>
    <input style="width: 10rem; padding: 0.5rem" type="submit" name="action" value="{{ $gameover ? 'New game' : 'Roll' }}" {{ $rollsLeft ? '' : 'disabled' }}>
</fieldset>
</form>
</div>


<div style="display: inline-block">
<form action="{{ url("/yatzy") }}" method="POST">
@csrf
<fieldset  {{ $rollsLeft > 2 ? "disabled" : null }}>
<table>
    <tr>
        <th colspan=3 style="background: lightgray;">Scoreboard</th>
    </tr>

    <?php foreach (array_keys($scoreboardFirstBlock) as $key) {
        $value = $scoreboardFirstBlock[$key]["score"] === 0 ? 'X' : $scoreboardFirstBlock[$key]["score"]; ?>

        <tr>
            <td><input type="radio" id ="score-<?= $key ?>" name="scoreboard" value="<?= $key ?>" <?= $value ? "disabled" : null  ?>></th>
            <td  <?= $value ? 'style="text-decoration: line-through"' : null  ?>><label for="score-<?= $key ?>"><?= $key ?></label></td>
            <td><?= $value ?></td>
        </tr>
    <?php } ?>
        <tr>
            <th colspan=2>Sum: </th>
            <td><?= $sum ?></td>
        </tr>
        <tr>
            <th colspan=2>Bonus: </th>
            <td><?= $scoreboard["firstBonus"]["score"] ?></td>
        </tr>
        <tr  style="background: lightgray;">
            <th colspan=2>Total: </th>
            <td><?= $total ?></td>
        </tr>
</table>
    <input style="width: 10rem; padding: 0.5rem" type="submit" name="action" value="setscore" <?= false ? 'disabled' : '' ?>>
</fieldset>
</form>
</div>

<div class="flex-col-justified-20r">
    <div>
        <p>Click on die to hold and click on Ones..Sixes to select score. Bonus for sum > {{ $bonusLimit }}.</p>
    </div>

    @if($gameover && !$highscoreSet)
    <form action="{{ url("/yatzy/highscore") }}" method="POST">
        @csrf
        <label for="acronym">Choose a acronym with 3 letters for the highscore table: </label>
        <input type="text" name="acronym" size="3" maxlength="3" placeholder="ABC" pattern="[a-z]{3}" style="text-transform:uppercase; text-align:center" required>
        <input hidden name="score" value="{{ $total ?? "21" }}">
        <input type="submit">
    </form>

    @else
        <div>
            <a href="{{ url("/yatzy/highscore") }}" class="link">Highscores</a>
        </div>
    @endif

</div>

</div>

@endsection
