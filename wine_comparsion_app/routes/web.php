<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\ProductRegistrationController;
use App\Http\Controllers\SearchController;
use App\Models\Folder;

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
    Route::get('/top', [ItemsController::class, 'index'])->name('items_list.index');
    Route::get('/top/search/type', [SearchController::class, 'type'])->name('search.type');
    Route::get('/top/search/country', [SearchController::class, 'country'])->name('search.country');
    Route::get('/wine/detail/{id}', [ItemsController::class, 'detail'])->name('item.detail.information');
    Route::get('/wine/favorite/add', [FavoriteController::class, 'add'])->name('favorite.add');
    Route::get('/wine/favorite/delete', [FavoriteController::class, 'delete'])->name('favorite.delete');
    Route::get('/mymemo', [FolderController::class, 'index'])->name('mymemo.index');
    Route::post('/mymemo/create_folder', [FolderController::class, 'create_folder'])->name('create.folder');
    Route::post('mymemo/delete_folder', [FolderController::class, 'folder_delete'])->name('delete.folder');
    Route::get('/mymemo/folder/add', [FolderController::class, 'add'])->name('folder.add');
    Route::get('mymemo/folder/select', [FolderController::class, 'folder_select'])->name('folder.select');
    Route::get('/mymemo/folder/delete/{id}', [FolderController::class, 'folder_delete'])->name('folder.delete');
    Route::get('/mymemo/memo/create', [MemoController::class, 'createView'])->name('createView');
    Route::post('/mymemo/memo/add', [MemoController::class, 'create'])->name('memo.add');
    Route::get('mymemo/memo/select', [MemoController::class, 'select'])->name('memo.select');
    Route::get('mymemo/memo/edit/{id}', [MemoController::class, 'editView'])->name('memo.editView');
    Route::post('mymemo/memo/edit/{id}', [MemoController::class, 'edit'])->name('memo.edit');

    // Route::get('/mymemo/folder/{id}/memo/create', [FolderController::class, 'memo_create'])->name('memo.create');
    Route::get('/product_registration', [ProductRegistrationController::class, 'show'])->name('product.registration');
    Route::get('/product_registration/item_add', [ProductRegistrationController::class, 'show_item_add'])->name('show.item.add');
    Route::post('/product_registration/item_add', [ProductRegistrationController::class, 'item_add'])->name('item.add');
    Route::get('/product_registration/item_detail/{id}', [ProductRegistrationController::class, 'item_detail'])->name('item.detail');
    Route::get('/product_registration/category_edit', [ProductRegistrationController::class, 'category_edit'])->name('category.edit');
    Route::post('/product_registration/category_edit/type_add', [ProductRegistrationController::class, 'type_add'])->name('type.add');
    Route::post('/product_registration/category_edit/country_add', [ProductRegistrationController::class, 'country_add'])->name('country.add');
    Route::post('/product_registration/category_edit/grape_add', [ProductRegistrationController::class, 'grape_add'])->name('grape.add');
    Route::get('/product_registration/category_delete', [ProductRegistrationController::class, 'category_delete'])->name('category.delete');
    Route::post('/product_registration/category_edit/type_delete', [ProductRegistrationController::class, 'type_delete'])->name('type.delete');
    Route::post('/product_registration/category_edit/country_delete', [ProductRegistrationController::class, 'country_delete'])->name('country.delete');
    Route::post('/product_registration/category_edit/grape_delete', [ProductRegistrationController::class, 'grape_delete'])->name('grape.delete');

    // Route::get('/memo', [MemoController::class, 'index'])->name('memo.index');
    // Route::get('folder/memo', [FolderController::class, 'index'])->name('folder_index');
    // Route::get('/folder/{id}/memos', [FolderController::class, 'index'])->name('folder.index');
    // Route::get('/memo', [FolderController::class, 'add'])->name('folder.add');
    /* Route::get('/memo/create', [MemoController::class, 'create'])->name('memo.create');
    Route::post('/memo/add', [MemoController::class, 'add'])->name('memo.add');
    Route::get('/memo/select', [MemoController::class, 'select'])->name('memo.select');
    Route::get('/memo/{id}/edit', [MemoController::class, 'edit']);
    Route::patch('memo/{id}', [MemoController::class, 'update']); */
    Route::get('/mypage', [ProfileController::class, 'index'])->name('mypage.index');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit.profile');
    Route::post('/edit-profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/items_list', [ItemsController::class, 'getRakutenItems'])->name('items');
});

Auth::routes();
