<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserDashboarController;
use App\Http\Controllers\ShortUrlController;

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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('user.auth');
Route::post('/user-login', [UserAuthController::class, 'userLogin'])->name('user.login')->middleware('user.auth');


Route::get('/user-register', [HomeController::class, 'userRegisterPage'])->name('user.register.page');
Route::post('/user-register', [UserAuthController::class, 'registerUser'])->name('user.register');

Route::middleware('user')->group(function (){
    Route::get('/user-dashboard', [UserDashboarController::class, 'index'])->name('user.dashboard');
    Route::post('/user-logout', [UserAuthController::class, 'userLogout'])->name('user.logout');
    Route::post('/short-url', [ShortUrlController::class, 'shortUrl'])->name('short.url')->middleware('throttle:url');
    Route::get('/short-url-result', [ShortUrlController::class, 'shortUrlResult'])->name('short.url.result');
    Route::get('/{link}', [ShortUrlController::class, 'link'])->name('link');
});

