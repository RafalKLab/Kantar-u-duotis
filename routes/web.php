<?php

use Illuminate\Support\Facades\Route;

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
})->name('welcome');

//delfi
Route::get('Delfi/News', [\App\Http\Controllers\ArticlesFromDelfiController::class, 'getArticles'])->name('getArticlesDelfi');
//15min
Route::get('15min/News', [\App\Http\Controllers\ArticlesFrom15minController::class, 'getArticles'])->name('getArticles15min');
//articles
Route::get('/Show/{id}', [\App\Http\Controllers\ArticlesController::class, 'showArticle'])->name('showArticle');
Route::post('/Delete', [\App\Http\Controllers\ArticlesController::class, 'deleteArticles'])->name('deleteArticles');


