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
                        <a href="{{ url('/yatzy') }}">Yatzy</a>
                    </li>
                    <li>
                        Highscore
                    </li>
    </ul>
</nav>


<div>
    <table class="highscore">
        <tr>
            <th colspan=3 style="background: lightgray;">Highscore</th>
        </tr>

        @foreach ($highscores as $score)
        @php
            ;
        @endphp
        <tr>
            <td style="width: 5rem;">{{ $score->acronym }}</td>
            <td style="width: 5rem;">{{ $score->score }}</td>
            <td>{{ $score->updated_at }}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection
