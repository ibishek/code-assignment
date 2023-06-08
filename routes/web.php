<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcelDataController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('dashboard');
    }

    return view('login');
})->name('login');

Route::get('github/redirect', [GithubController::class, 'redirect']);
Route::get('github/callback', [GithubController::class, 'callback'])->name('github.callback');

Route::middleware('auth')->group(function () {
    Route::post('logout', LogoutController::class);
    Route::prefix('dashboard')->group(function () {
        Route::get('/', DashboardController::class);
        Route::get('excels', [ExcelDataController::class, 'index']);
        Route::post('excels', [ExcelDataController::class, 'convert']);
        Route::get('excels/{slug}', [ExcelDataController::class, 'download']);
    });
});
