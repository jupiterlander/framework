<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HighScore;

class HighScoreController extends Controller
{

    /**
     * Store a new highscore in the database.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $req)
    {
        $validated = $req->validate([
            'score' => 'required|digits_between:1,3',
            'acronym' => 'required|alpha:size:3']);

        $yatzyGame = session('yatzy', null) ? unserialize(session('yatzy')) : null;

        HighScore::create([
            'acronym' =>  strtoupper($validated['acronym']),
            'score' => $validated['score']]);

        $req->session()->put('yatzy-highscore-set', true);
        $req->session()->put('yatzy', serialize($yatzyGame));

        return redirect('yatzy/highscore');
    }


     /**
     * Show highscores in the database.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $highscores =  HighScore::orderBy('score', 'desc')->get();

        return view('highscore', [ 'highscores' => $highscores ]);
    }
}
