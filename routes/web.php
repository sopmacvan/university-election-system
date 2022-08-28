<?php

use App\Http\Controllers\CandidateController;
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

//feature1 schedule election
Route::view('/create-election', 'election.create-new')->name('create-election');
Route::post('/save-created-election', [ElectionController::class, 'saveCreatedElection'])->name('save-created-election');
Route::view('/edit-election', 'election.edit')->name('edit-election');
Route::post('/save-edited-election', [ElectionController::class, 'saveEditedElection'])->name('save-edited-election');

//feature2 register as candidate
Route::get('/register-candidate', [CandidateController::class, 'registerCandidate'])->name('register-candidate');
Route::post('/save-registered-candidate', [CandidateController::class, 'saveRegisteredCandidate'])->name('save-registered-candidate');

//feature 3 cancel election
Route::get('/cancel-election', [ElectionController::class, 'cancelElection'])->name('cancel-election');
