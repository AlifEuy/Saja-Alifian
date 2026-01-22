<?php
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;

Route::post('/service', [ServiceController::class, 'store']);