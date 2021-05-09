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

   
        $data = [
            "header" => "Yatzy",
            "scoreboard" => $yatzyGame->getScoreboard(),
            "diceValues" => $yatzyGame->getPlayerHand(),
            "rolls" => $yatzyGame->getRolls(),
            "maxRolls" =>  $yatzyGame::MAXROLLS,
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