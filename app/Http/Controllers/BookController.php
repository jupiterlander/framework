<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
     /**
     * Show books in the database.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $books =  Book::orderBy('author', 'desc')->get();

        return view('books', [ 'books' => $books ]);
    }
}
