<?php

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

Route::get('/dashboard', function () {
    return view('welcome', ['evaluations' => Evaluation::all()]);
})->name('dashboard');

Route::prefix('evaluations')->group(function () {
    Route::get('/{company}', [EvaluationController::class, 'create'])->middleware('auth');
    Route::post('', [EvaluationController::class, 'store']);
});

require __DIR__.'/auth.php';
