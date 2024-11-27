<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LandingPAGE');
});

Route::get('/coba', function () {
    return view('COBA');
});

Route::get('bacaData', [DataController::class, 'dataTampil']);
