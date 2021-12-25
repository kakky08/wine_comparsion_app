<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\MemoController;


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
    Route::get('/memo', [MemoController::class, 'index'])->name('memo.index');
    Route::get('/memo/add', [MemoController::class, 'add'])->name('memo.add');
    Route::get('/memo/select', [MemoController::class, 'select'])->name('memo.select');
    Route::get('/memo/{id}/edit', [MemoController::class, 'edit']);
    Route::patch('memo/{id}', [MemoController::class, 'update']);
    Route::get('/mypage', [ProfileController::class, 'index'])->name('mypage.index');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit.profile');
    Route::post('/edit-profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/items_list', [ItemsController::class, 'getRakutenItems'])->name('items');
});

Auth::routes();
