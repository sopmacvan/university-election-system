<?php

use App\Http\Controllers\BallotController;
use App\Http\Controllers\ElectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', function () {
//    return view('welcome');
    return redirect('login');
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [ElectionController::class, 'showElectionStatus'])->name('home');

//feature4 voting
Route::get('/vote', [BallotController::class, 'startVoting'])->name('vote');
Route::post('/save-vote', [BallotController::class, 'saveVote'])->name('save-vote');
