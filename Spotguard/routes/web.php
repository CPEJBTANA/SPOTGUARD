<?php

use App\Livewire\Resident\Dashboard\ResidentDashboard;
use App\Livewire\Resident\Guest\ResidentGuest;
use Illuminate\Support\Facades\Route;

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

//auth route for both 
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\NewDashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:Resident']], function () {
    Route::get('resident/dashboard', ResidentDashboard::class)->name('resident.dashboard');
    Route::get('resident/guest', ResidentGuest::class)->name('resident.guest');
});
