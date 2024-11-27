<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LandingPAGE');
});

Route::get('/coba', function () {
    return view('COBA');
});
