<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;

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

Route::resource('news', NewsController::class);

// Route::prefix('news')->group(function () {
//     Route::get('', [NewsController::class, 'index'])->name('news.index');
//     Route::get('{news}', [BlogController::class, 'show'])->name('news.show');
// });

Route::controller(PageController::class)->group(function () {
    Route::get('/pages', 'index')->name('page.index');
    Route::get('/{page}', 'show')->name('page.show');
});

Route::view('', 'welcome')->name('welcome');
