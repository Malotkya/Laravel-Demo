<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view("index");
});

//.csv file upload
Route::get('/Upload', 'Upload@get');
Route::post('/Upload', 'Upload@post');

//search database
Route::get('/Search', 'Search@get');
Route::post('/Search', 'Search@post');

Route::get('/Api', 'ApiCall@get');
Route::get('/Api', 'ApiCall@post');
