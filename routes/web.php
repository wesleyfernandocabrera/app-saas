<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

    Route::middleware(['auth'])->group(function(){
    Route::get('/', function () {
        return view('home');
    })->name('home');
    
    Route::get('/users', [UserController::class, 'index'])->name('users.index');  
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');   
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');    
});