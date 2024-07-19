<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', 'App\Http\Controllers\JobController');

// Auth
Route::get('/register', 'App\Http\Controllers\RegisteredUserController@create');
Route::post('/register', 'App\Http\Controllers\RegisteredUserController@store');

Route::get('/login', 'App\Http\Controllers\SessionController@create');
Route::post('/login', 'App\Http\Controllers\SessionController@store');
Route::post('/logout', 'App\Http\Controllers\SessionController@destroy');
