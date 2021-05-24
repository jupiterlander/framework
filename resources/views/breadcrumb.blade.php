<?php

declare(strict_types=1);

?>
@section('breadcrumb')

<nav>
    <ul class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Home</a>
        </li>

        @foreach ( Request::segments() as $segment)
        <li>
            <a href="{{ $segment }}">Yatzy</a>
        </li>
        @endforeach
        <li>
            <a href="{{ url('/yatzy/highscore') }}">Highscore</a>
        </li>

    </ul>
</nav>

@endsection
