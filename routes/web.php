<?php

use App\Http\Controllers\ShortLinkController;
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

Route::get('/', [ShortLinkController::class, 'index']
);

Route::post('/generate-shorten-link', [ShortLinkController::class, 'store'])->name('generate-shortenlink');
Route::get('/{code}', [ShortLinkController::class, 'show'])->name('show-shorten-link');

