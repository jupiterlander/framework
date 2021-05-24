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
                        Books
                    </li>
    </ul>
</nav>


<div class="book-list">
    @foreach ($books as $book)
        <div class="card">
            <img src="{{ url("/images/" . $book->image) }}">
            <div class="inner">
                <h3>{{ $book->title }}</h3>
                <p>{{ $book->author }}</p>
                <p>isbn: {{ $book->isbn }}</p>
            </div>
        </div>
    @endforeach

</div>

@endsection
