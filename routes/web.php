<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BallController;
use App\Http\Controllers\BucketController;

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
});

Route::get('/buckets', [BucketController::class, 'index'])->name('buckets.index');
Route::post('/buckets', [BucketController::class, 'store'])->name('buckets.store');
Route::get('/balls', [BallController::class, 'index'])->name('balls.index');
Route::post('/balls', [BallController::class, 'store'])->name('balls.store');
Route::post('/suggest-buckets', [BucketController::class, 'suggestBuckets'])->name('buckets.suggest-buckets');
Route::match(['get', 'post'], '/suggest-buckets', [BucketController::class, 'suggestBuckets'])->name('buckets.suggest');
