<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
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

//Dynamic Pages
Route::get('/packages', [PagesController::class, 'package_list'])->name('package.list');
Route::get('/packages/{tour_code}', [PagesController::class, 'package_show'])->name('package.show');
Route::get('/package/{tour_code}/book', [PagesController::class, 'package_book'])->name('package.book');
Route::post('/package/book', [PagesController::class, 'package_book_store'])->name('package.book.store');

//Foreign Exchange for User or Visitor
Route::get('/foreign-exchange', [PagesController::class, 'foreign_exchange'])->name('foreign.exchange');
Route::post('/foreign-exchange', [PagesController::class, 'foreign_exchange_store'])->name('foreign.exchange.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->middleware('user')->group(function () {

    Route::view('about', 'about')->name('about')->middleware('auth');
    // Package Function
    Route::get('/packages', [UserController::class, 'package_enrolled'])->name('user.package.index');

    Route::get('/money', [UserController::class, 'money_index'])->name('user.money.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update')->middleware('auth');



Route::group(['prefix'=>'admin', 'middleware'=>'admin'], function() {
    Route::get('/', [AdminController::class, 'home'])->name('admin');

    ROute::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    //Admin Function
    Route::get('/admin', [AdminController::class, 'admin_index'])->name('admin.admin.index');
    Route::view('/admin/create', 'admin.admin.create')->name('admin.admin.create');
    Route::post('/admin', [AdminController::class, 'admin_store'])->name('admin.admin.store');

    //user function
    Route::get('/users', [AdminController::class, 'user_index'])->name('admin.user.index');
    Route::get('/user/{id}/edit', [AdminController::class, 'user_edit'])->name('admin.user.edit');
    Route::put('/user/{id}', [AdminController::class, 'user_update'])->name('admin.user.update');
    Route::delete('/user/{id}', [AdminController::class, 'user_destroy'])->name('admin.user.destroy');

    //Package 
    Route::get('/packages', [AdminController::class, 'package_index'])->name('admin.package.index');
    Route::view('/package/create', 'admin.package.create')->name('admin.package.create');
    Route::post('/package', [AdminController::class, 'package_store'])->name('admin.package.store');
    Route::get('/package/{id}/edit', [AdminController::class, 'package_edit'])->name('admin.package.edit');
    Route::put('/package/{id}', [AdminController::class, 'package_update'])->name('admin.package.update');
    Route::delete('/package/{id}', [AdminController::class, 'package_destroy'])->name('admin.package.destroy');

    //Package Enrolled
    Route::get('/enrolled/package', [AdminController::class, 'enrolled_package'])->name('admin.enrolled.package');
    Route::put('/enrolled/package/{id}', [AdminController::class, 'enrolled_update'])->name('admin.enrolled.update');
    Route::delete('/enrolled/package/{id}', [AdminController::class, 'enrolled_destroy'])->name('admin.enrolled.destroy');

    //Foreign Exchange rate
    Route::get('/exchange', [AdminController::class, 'exchange_index'])->name('admin.exchange.index');
    Route::view('/exchange/create', 'admin.exchange.create')->name('admin.exchange.create');
    Route::post('/exchange', [AdminController::class, 'exchange_store'])->name('admin.exchange.store');
    Route::delete('/exchange/{id}', [AdminController::class, 'exchange_destroy'])->name('admin.exchange.destroy');
    Route::put('/exchange/{id}', [AdminController::class, 'exchange_status'])->name('admin.exchange.status');

    //Money exchange Request
    Route::get('/money', [AdminController::class, 'money_request'])->name('admin.money.index');
    Route::put('/money/status/{id}', [AdminController::class, 'money_status'])->name('admin.money.status');

    //message function
    Route::get('/messages', [AdminController::class, 'message_index'])->name('admin.message.index');
    Route::get('/message/{id}', [AdminController::class, 'message_show'])->name('admin.message.show');


});
