<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| PUBLIK
|--------------------------------------------------------------------------
*/

// Homepage publik (form tambah servis)
Route::get('/', [ServiceController::class, 'publicCreate']);
Route::post('/service/public', [ServiceController::class, 'publicStore']);

// Login admin
Route::view('/login', 'login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/set-admin-session', function () {
    session(['admin' => true]);
    return response()->json(['status' => 'ok']);
});
Route::post('/logout', function () {
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/');
});

//update data
Route::post('/service/update', [ServiceController::class, 'update']);
Route::post('/service/delete', [ServiceController::class, 'destroy']);


/*
|--------------------------------------------------------------------------
| ADMIN (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('admin')->group(function () {

    Route::get('/dashboard', [ServiceController::class, 'index']);

    // halaman create khusus admin
    Route::get('/service/create', [ServiceController::class, 'create']);
    Route::post('/service', [ServiceController::class, 'store']);

    Route::get('/service/{id}/edit', [ServiceController::class, 'edit']);
    Route::post('/service/{id}/update', [ServiceController::class, 'update']);
    Route::get('/service/{id}/delete', [ServiceController::class, 'destroy']);
});
