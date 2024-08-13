<?php

use App\Http\Controllers\Main;
use Illuminate\Support\Facades\Route;

// handling opening page
Route::get('/', [Main::class, 'indexpage']);
Route::get('/all', [Main::class, 'allpage']);
Route::get('/projectdetail/{project:slug}', [Main::class, 'projectdetailpage']);
Route::get('/editdetail/{project:slug}', [Main::class, 'projecteditpage']);

// handling post form
Route::post('/createproject', [Main::class, 'createproject']);

// handling action
Route::get('/deleteproject/{project:slug}', [Main::class, 'deleteproject']);

// default laravel welcome page
Route::get('/test', [Main::class, 'testpage']);
