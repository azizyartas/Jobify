<?php

use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    $job = Job::first();
    TranslateJob::dispatch($job);

    return 'Done!';
});

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::get('/jobs', 'App\Http\Controllers\JobController@index');
Route::get('/jobs/create', 'App\Http\Controllers\JobController@create');
Route::post('/jobs', 'App\Http\Controllers\JobController@store')->middleware('auth:web');
Route::get('/jobs/{job}', 'App\Http\Controllers\JobController@show');
Route::get('/jobs/{job}/edit', 'App\Http\Controllers\JobController@edit')
    ->middleware('auth:web')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', 'App\Http\Controllers\JobController@update');
Route::delete('/jobs/{job}', 'App\Http\Controllers\JobController@destroy');

// Auth
Route::get('/register', 'App\Http\Controllers\RegisteredUserController@create');
Route::post('/register', 'App\Http\Controllers\RegisteredUserController@store');

Route::get('/login', 'App\Http\Controllers\SessionController@create')->name('login');
Route::post('/login', 'App\Http\Controllers\SessionController@store');
Route::post('/logout', 'App\Http\Controllers\SessionController@destroy');
