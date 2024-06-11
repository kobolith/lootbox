<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LootboxController;
use App\Http\Controllers\LootController;
use App\Http\Controllers\KeyController;

Route::get('/', function () {
    return view('homescreen');
});

Route::get('/open', [LootboxController::class, 'generate']);
Route::post('/open', [LootboxController::class, 'open']);

Route::get('/keys', [KeyController::class, 'getValid']);
