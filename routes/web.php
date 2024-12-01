<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LandingPAGE');
});

Route::get('/lihatdata', [DataController::class, 'dataTampil']);

Route::get('/inputPengolahan', function () {
    return view('Pengolahan_1');
});
Route::get('/PengolahanA', function () {
    return view('Pengolahan_2');
});
Route::get('/Pengolahan_3', function () {
    return view('Pengolahan_3');
});
Route::get('/Pengolahan_4', function () {
    return view('Pengolahan_4');
});
Route::get('/Pengolahan_5', function () {
    return view('Pengolahan_5');
});
Route::get('/Pengolahan_6', function () {
    return view('Pengolahan_6');
});
Route::get('/Pengolahan_7', function () {
    return view('Pengolahan_7');
});


Route::get('/coba', function () {
    return view('COBA');
});

Route::get('bacaData', [DataController::class, 'dataTampil']);
