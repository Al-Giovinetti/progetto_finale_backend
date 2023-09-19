<?php

use App\Http\Controllers\Admin\BoosicianController;


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
    return view('auth.login');
});

Auth::routes();


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/home', [BoosicianController::class, 'index'])->name('home');
    Route::resource('/musicians', BoosicianController::class);
});


// Route::name('guest.')->group(function () {
//     Route::get('/', [ DashboardController::class, 'home'])->name('home');
 
// });