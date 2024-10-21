<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/set-session', function () {
    session(['user' => 'Jabriel']);
    return 'Session set';
});


Route::get('/get-session', function () {
    return session('user', 'Session not found');
});
