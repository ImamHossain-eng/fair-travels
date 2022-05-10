<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PagesController::class, 'homepage'])->name('homepage');

Route::post('/contact', [PagesController::class, 'contact'])->name('contact');

//General static page
Route::get('/pages/{name}', [PagesController::class, 'pageByName'])->where('name', 'contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('user')->group(function () {
    Route::view('about', 'about')->name('about')->middleware('auth');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});



Route::group(['prefix'=>'admin', 'middleware'=>'admin'], function() {
    Route::get('/', [AdminController::class, 'home'])->name('admin');

    //user function
    Route::get('/users', [AdminController::class, 'user_index'])->name('admin.user.index');
    Route::get('/user/{id}/edit', [AdminController::class, 'user_edit'])->name('admin.user.edit');
    Route::put('/user/{id}', [AdminController::class, 'user_update'])->name('admin.user.update');
    Route::delete('/user/{id}', [AdminController::class, 'user_destroy'])->name('admin.user.destroy');

    //message function
    Route::get('/messages', [AdminController::class, 'message_index'])->name('admin.message.index');
    Route::get('/message/{id}', [AdminController::class, 'message_show'])->name('admin.message.show');

});
