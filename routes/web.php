<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YatzyController;
use App\Http\Controllers\HighScoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});
Route::get('/yatzy', [YatzyController::class, 'play']);
Route::post('/yatzy', [YatzyController::class, 'process']);
// Route::get('yatzy/highscore', function () {
//     //dd(HighScore::all());
//     return view('highscore', [ 'highscores' => HighScore::all()]);
// });
Route::get('yatzy/highscore', [HighScoreController::class, 'show']);
Route::post('yatzy/highscore', [HighScoreController::class, 'store']);

Route::get('/kill', [YatzyController::class, 'kill']);

Route::get('/session', function (Request $req) {
    $tmp = session()->all();
    $tmp['_token'] = 'hidden....';
    return $tmp;
});

Route::get('/php', function (Request $req) {
    return phpinfo();
});
