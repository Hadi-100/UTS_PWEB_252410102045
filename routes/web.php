
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'login']);

Route::post('/login', [PageController::class, 'processLogin']);

Route::get('/dashboard', [PageController::class, 'dashboard']);

Route::get('/pengelolaan', [PageController::class, 'pengelolaan']);

Route::get('/matakuliah/{kode}', [PageController::class, 'detailMatakuliah'])
    ->name('matakuliah.detail');

Route::get('/profile', [PageController::class, 'profile']);

Route::post('/profile', [PageController::class, 'saveProfile']);

Route::post('/logout', [PageController::class, 'logout']);