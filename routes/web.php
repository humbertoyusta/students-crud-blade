<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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

Route::get('/', [StudentsController::class, 'findAll']) -> name('all');

Route::get('/student/{id}', [StudentsController::class, 'show']) -> name('student-show');

Route::get('student', function () { return view('add/index'); }) -> name('student-add');

Route::post('/student', [StudentsController::class, 'add']) -> name('student-add');

Route::get('/student/edit/{id}', [StudentsController::class, 'getEdit']) -> name('student-edit');

Route::patch('/student/edit/{id}', [StudentsController::class, 'edit']) -> name('student-edit');

Route::delete('/student/{id}', [StudentsController::class, 'delete']) -> name('student-delete');
