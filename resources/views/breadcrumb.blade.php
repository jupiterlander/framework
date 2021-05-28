<?php

declare(strict_types=1);

?>
@section('breadcrumb')

<nav>
    <ul class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Home</a>
        </li>

        @for($i = 1; $i <= count(Request::segments()); $i++)
            @php
                $tmpUrl = "/";
            @endphp
            @endphp
            <li>
                <li>
                    <a href="{{ $segment }}">Yatzy</a>
                </li>
            </li>
        @endfor

        @endforeach
        <li>
            <a href="{{ url('/yatzy/highscore') }}">Highscore</a>
        </li>

    </ul>
</nav>

@endsection
