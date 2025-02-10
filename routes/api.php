<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PublisherController;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('publisher', PublisherController::class);
