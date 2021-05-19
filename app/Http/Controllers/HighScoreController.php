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
    public function store(Request $req) {
        $yatzyGame = session('yatzy', null) ? unserialize(session('yatzy')) : null;
        $total = $yatzyGame->getScoreboard()["Total"]["score"];

        $highscore = new HighScore();
        $highscore->akronym = strtoupper($req->input('acronym', ''));
        $highscore->score = $req->input('score');

        $highscore->save();

        $yatzyGame->setHighscore(true);
        $req->session()->put('yatzy', serialize($yatzyGame));

        return redirect('yatzy/highscore');
    }

     /**
     * Store a name for highscore in the database.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeName($id, $name) {

        $highscore = HighScore::find($id);
        $highscore->name = $name;

        return redirect('yatzy/highscore');
    }


     /**
     * Show highscores in the database.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\View\View
     */
    public function show(Request $request) {
        $highscores =  HighScore::orderBy('score', 'desc')->get();

        return view('highscore', [ 'highscores' => $highscores ]);
    }
}
