<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\QuizController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/users/activate-account',[UserController::class, 'activate'])->name('account-activation');
Route::put('/users/activate-account',[UserController::class, 'activation']);
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/prevention', [ArticleController::class, 'prevention'])->name('prevention');
Route::get('/articles/treatment', [ArticleController::class, 'treatment'])->name('treatment');
Route::get('/articles/pmtct', [ArticleController::class, 'pmtct'])->name('pmtct');
Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes');

Route::group(['middleware' => ['auth:sanctum','prevent-back-history','suspended','activate','verified']], function(){
    Route::get('/users/registration', [UserController::class, 'create'])->name('user-registration');
    Route::post('/users/registration', [UserController::class, 'store']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/is-suspended', [UserController::class, 'redirectIfSuspended']);
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles-create');
    Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('article');
    Route::get('/articles/{article:slug}/edit', [ArticleController::class, 'edit'])->name('article-edit');
    Route::get('/quizzes/create', [QuizController::class, 'create'])->name('quizzes-create');
    Route::get('/quizzes/{quiz:slug}/edit', [QuizController::class, 'edit'])->name('quizzes-edit');  

    
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify'); 
