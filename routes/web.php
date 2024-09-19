<?php

use Illuminate\Support\Facades\Route;

// Frontend

Route::get('/', function () {
    return view('frontend.contents.home');
});

Route::get('/reserve', function () {
    return view('frontend.contents.reserve');
});

Route::get('/page', function () {
    return view('frontend.contents.cafePage');
});

Route::get('/login', function () {
    return view('auth.loginFront');
});

Route::get('/register', function () {
    return view('auth.registerFront');
});

// Backend

Route::get('/backend-dash', function () {
    return view('backend.contents.home');
});




