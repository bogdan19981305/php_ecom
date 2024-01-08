<?php

use App\Controllers\HomeController;
use App\Controllers\MoviesController;
use App\Kernel\Router\Route;

return [
    Route::get('home', [HomeController::class, 'index']),
    Route::get('movies', [MoviesController::class, 'index']),
];