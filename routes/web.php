<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MeetingController;
use App\Http\Livewire\LogisticCalculator;
use App\Http\Livewire\Leaderboard;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::prefix('bathroom')->group(function () {
    Route::get('/', [App\Http\Controllers\BathroomController::class, 'index'])->name('bathroom');
    Route::get('/create', [App\Http\Controllers\BathroomController::class, 'create'])->name('bathroom.create');
    Route::post('/create', [App\Http\Controllers\BathroomController::class, 'store'])->name('bathroom.store');
    Route::get('/{id}', [App\Http\Controllers\BathroomController::class, 'show'])->name('bathroom.show');
    Route::get('/{id}/edit', [App\Http\Controllers\BathroomController::class, 'edit'])->name('bathroom.edit');
    Route::post('/{id}/edit', [App\Http\Controllers\BathroomController::class, 'update'])->name('bathroom.update');
    Route::post('/{id}/delete', [App\Http\Controllers\BathroomController::class, 'destroy'])->name('bathroom.destroy');

});
Route::get('/logistic-calculator', function () {
    return view('calculators.logisticCalculator');
})->name('logistic-calculator');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/leaderboard', Leaderboard::class);

Route::resource('questions', QuestionController::class);


Route::resource('meetings', MeetingController::class);

Route::post('meeting/signal/{meetingId}', [MeetingController::class, 'sendSignal'])->name('meeting.signal');
Route::get('meeting/join/{meetingId}', [MeetingController::class, 'join'])->name('meeting.join');

