<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StatisticsController;
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

/*Route::get('/', function () {
    return view('welcome');
})->name('dashboard');*/

Route::get('/',  [ArticleController::class, 'index'])->name('dashboard');

Route::get('/users/activate-account',[UserController::class, 'activate'])->name('account-activation');
Route::put('/users/activate-account',[UserController::class, 'activation']);
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles?category=prevention', [ArticleController::class, 'prevention'])->name('prevention');
Route::get('/articles?category=treatment', [ArticleController::class, 'treatment'])->name('treatment');
Route::get('/articles?category=pmtct', [ArticleController::class, 'pmtct'])->name('pmtct');
Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes');

Route::group(['middleware' => ['auth:sanctum','prevent-back-history','suspended','activate','verified']], function(){
    Route::get('/users/registration', [UserController::class, 'create'])->name('user-registration');
    Route::post('/users/registration', [UserController::class, 'store']);
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/{user:slug}', [UserController::class, 'show'])->name('user');
    Route::get('/users/is-suspended', [UserController::class, 'redirectIfSuspended']);
    Route::get('/articles/unpublished', [ArticleController::class, 'unpublished'])->name('articles-unpublished');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles-create');
    Route::get('/articles/my-articles', [ArticleController::class, 'myArticles'])->name('my-articles');
    Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('article');
    Route::get('/articles/{article:slug}/edit', [ArticleController::class, 'edit'])->name('article-edit');
    Route::get('/quizzes/create', [QuizController::class, 'create'])->name('quizzes-create');
    Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');
    Route::get('/quizzes/{quiz:slug}/edit', [QuizController::class, 'edit'])->name('quizzes-edit');   
    Route::get('/notifications',[NotificationController::class,'index'])->name('notifications');
    Route::get('/notifications/mark-as-read',[NotificationController::class,'markRead'])->name('mark-notifications');
    Route::get('/notifications/delete-read',[NotificationController::class,'destroyRead'])->name('delete-read-notifications');
    Route::get('/notifications/delete-all',[NotificationController::class,'destroy'])->name('delete-notifications');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify'); 


