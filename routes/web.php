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
Route::get('/', [PagesController::class, 'homepage']);

//General static page
Route::get('/pages/{name}', [PagesController::class, 'pageByName']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('user')->group(function () {
    Route::view('about', 'about')->name('about')->middleware('auth');

  

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Route::get('/admin', function(){
//     return 'admin';
// })->name('admin');

Route::group(['prefix'=>'admin', 'middleware'=>'admin'], function() {
    Route::get('/', [AdminController::class, 'home'])->name('admin');
});
