<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;

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

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');



Route::group(['middleware' => ['auth:sanctum','prevent-back-history','activate']], function(){
    Route::get('/users/registration', [UserController::class, 'create'])->name('user-registration');
    Route::post('/users/registration', [UserController::class, 'store']);
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('article-create');
    
});

Route::get('/users/activate-account',[UserController::class, 'activate'])->name('account-activation');
Route::put('/users/activate-account',[UserController::class, 'activation']);
Route::get('/articles', [ArticleController::class, 'create'])->name('articles');