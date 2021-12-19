<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.index');
Route::get('/user', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/user/register', [RegisterController::class, 'register'])->name('user.exec.register');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/top', function () {
        return view('items_list');
    })->name('items_list.index');
    Route::get('/memo', function () {
        return view('memos_list');
    })->name('memos_list.index');
    Route::get('/mypage', [ProfileController::class, 'index'])->name('mypage.index');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit.profile');
    Route::post('/edit-profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Auth::routes();
