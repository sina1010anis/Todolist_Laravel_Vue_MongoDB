<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\SubTasks;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class , 'index']);
Route::post('new/task' , [TaskController::class , 'create'])->name('create_task');
Route::post('get/tasks' , [TaskController::class , 'get'])->name('get_tasks');
Route::post('get/sub/tasks' , [SubTasks::class , 'get'])->name('get_sub_tasks');
Route::post('new/sub/tasks' , [SubTasks::class , 'create'])->name('create_sub_tasks');
