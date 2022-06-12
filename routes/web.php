<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\QuestionController;
use App\Models\Evaluation;
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

Route::get('{url}', [DashboardController::class, 'index'])
    ->where('url', 'dashboard|')
    ->name('dashboard');

Route::prefix('evaluations')->middleware('auth')->group(function () {
    Route::get('/{company}', [EvaluationController::class, 'create'])->middleware('auth');
    Route::post('', [EvaluationController::class, 'store']);
});

Route::prefix('categories')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('', [CategoryController::class, 'index']);
    Route::get('create', [CategoryController::class, 'create']);
    Route::post('', [CategoryController::class, 'store']);
    Route::get('edit/{category}', [CategoryController::class, 'edit']);
    Route::put('/{category}', [CategoryController::class, 'update']);
    Route::delete('/{category}', [CategoryController::class, 'destroy']);
});

Route::prefix('questions')->middleware(['auth', 'is_admin'])->group(function () {
    Route::post('', [QuestionController::class, 'store']);
    Route::get('', [QuestionController::class, 'index']);
    Route::get('create', [QuestionController::class, 'create']);
});

Route::prefix('companies')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('', [CompanyController::class, 'index']);
    Route::get('create', [CompanyController::class, 'create']);
    Route::post('', [CompanyController::class, 'store']);
    Route::get('edit/{company}', [CompanyController::class, 'edit']);
    Route::put('/{company}', [CompanyController::class, 'update']);
});

Route::prefix('comment')->middleware(['auth'])->group(function () {
    Route::post('/{comment?}', [CommentController::class, 'create']);
});

require __DIR__.'/auth.php';
