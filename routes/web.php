<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/projects', [ProjectsController::class, 'index']);

    Route::get('/projects/{project}', [ProjectsController::class, 'show']);

    Route::post('/projects', [ProjectsController::class, 'store']);


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});


Auth::routes();
