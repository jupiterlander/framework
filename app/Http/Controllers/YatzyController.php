<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jupiterlander\yatzy\YatzyGame;

class YatzyController extends Controller
{
    public function play(Request $request)
    {
        //$yatzyGame = isset($_SESSION['yatzy']) ? unserialize($_SESSION['yatzy']) : new YatzyGame();

        $yatzyGame = session('yatzy', null) ? unserialize(session('yatzy')) : new YatzyGame();

        $scoreboard = $yatzyGame->getScoreboard();
        $diceValues = $yatzyGame->getPlayerHand();
        $rolls =  $yatzyGame->getRolls();

        $highscoreSet = $request->session()->get('yatzy-highscore-set', false);

        // Helper-variables for shorter syntax
        $rollsLeft = $yatzyGame::MAXROLLS - $rolls;
        $firstRoll = ($rolls == 0);
        $scoreboardFirstBlock = $scoreboard["firstBlock"];
        $sum = $scoreboard["firstTotal"]["score"];
        $total = $scoreboard["Total"]["score"];
        $gameover = !is_null($total);

        $data = [
            "header" => "Yatzy",
            "scoreboard" => $scoreboard,
            "diceValues" => $diceValues,
            "rolls" => $rolls,
            "maxRolls" =>  $yatzyGame::MAXROLLS,
            "rollsLeft" => $rollsLeft,
            "firstRoll" => $firstRoll,
            "scoreboardFirstBlock" => $scoreboardFirstBlock,
            "sum" => $sum,
            "total" => $total,
            "gameover" => $gameover,
            "highscoreSet" => $highscoreSet,
            "bonusLimit" => $scoreboard['firstBonus']['limit'],
        ];

        return view('yatzy', $data);
    }


    public function process(Request $request)
    {
        if ($request->getSession()) {
            $yatzyGame = $request->session()->exists('yatzy') ? unserialize($request->session()->get('yatzy')) : new YatzyGame();
            $yatzyGame->play($_POST['action'] ?? null, $_POST);

            if($_POST['action'] == 'new') {
                $request->session()->put('yatzy-highscore-set', false);
            }

            $request->session()->put('yatzy', serialize($yatzyGame));
        }

        return redirect('/yatzy');
    }

    public function kill(Request $request)
    {
        $request->session()->flush();
        return redirect('/yatzy');
    }
}
