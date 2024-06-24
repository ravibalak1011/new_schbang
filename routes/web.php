<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('master');
});

Route::group([
    'middleware'=> ['guest'],
], function () {
    Route::get("admin", [AuthController::class, "admin"])->name("admin");

    Route::post("admin", [AuthController::class, "admin"])->name("admin");

    Route::get("register", [AuthController::class, "register"])->name("register");
    Route::post("register", [AuthController::class, "register"])->name("register");

    Route::get('/users', [CustomerController::class, 'showUsers'])->name('users');

});


Route::group( [
    "middleware"=> ["auth"],
], function(){
    Route::get("dashboard", [AuthController::class, "dashboard"])->name("dashboard");

    Route::get('/upload', [CustomerController::class, 'showUploadForm'])->name('upload.form');
    Route::post('/upload', [CustomerController::class, 'uploadFile'])->name('upload.file');

    // Route::get('/users', [CustomerController::class, 'showUsers'])->name('users');

    Route::get("logout", [AuthController::class, "logout"])->name("logout");
});


