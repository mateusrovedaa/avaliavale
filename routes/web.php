<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EvaluationController;
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

Route::get('/{url}', function () {
    return view('welcome', ['evaluations' => Evaluation::all()]);
})->where('url', 'dashboard|')->name('dashboard');

Route::prefix('evaluations')->group(function () {
    Route::get('/{company}', [EvaluationController::class, 'create'])->middleware('auth');
    Route::post('', [EvaluationController::class, 'store']);
});

Route::prefix('categories')->group(function () {
    Route::get('', [CategoryController::class, 'index']);
    Route::get('create', [CategoryController::class, 'create']);
    Route::post('', [CategoryController::class, 'store']);
    Route::get('edit/{category}', [CategoryController::class, 'edit']);
    Route::put('/{category}', [CategoryController::class, 'update']);
    Route::delete('/{category}', [CategoryController::class, 'destroy']);
});

require __DIR__.'/auth.php';
