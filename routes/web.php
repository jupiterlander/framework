<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YatzyController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/yatzy', [YatzyController::class, 'play']);
Route::post('/yatzy', [YatzyController::class, 'process']);
Route::get('/kill', [YatzyController::class, 'kill']);
