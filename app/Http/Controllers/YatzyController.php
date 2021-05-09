<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use Jupiterlander\yatzy\YatzyGame as YatzyGame;

class YatzyController extends Controller
{
    public function play()
    {
        //$yatzyGame = isset($_SESSION['yatzy']) ? unserialize($_SESSION['yatzy']) : new YatzyGame();

        $yatzyGame = session('yatzy', null) ? unserialize(session('yatzy')) : new YatzyGame();

        $scoreboard = $yatzyGame->getScoreboard();
        $diceValues = $yatzyGame->getPlayerHand();
        $rolls =  $yatzyGame->getRolls();

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
        ];

        return view('yatzy', $data);
    }

    
    public function process(Request $request)
    {
        $yatzyGame = $request->session()->exists('yatzy') ? unserialize($request->session()->get('yatzy')) : new YatzyGame();
        $yatzyGame->play($_POST['action'] ?? null, $_POST);

        $request->session()->put('yatzy', serialize($yatzyGame));
        return redirect('/yatzy');
    }

    public function kill()
    {
        Session::flush();
        return redirect('/yatzy');
    }
   
}