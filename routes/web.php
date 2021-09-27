<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\TaskController;

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
    return view('welcome');
});
// create new folder
// Route::get('/folders/create', 'App\Http\Controllers\FolderController@showCreateFrom')->name('folders.create');
Route::get('/folders/create', [FolderController::class, 'showCreateFrom'])->name('folders.create');
Route::post('/folders/create', [FolderController::class, 'create']);

// top page
Route::get('folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');

// create new task
Route::get('/folders/{id}/tasks/create', [TaskController::class, 'showCreateForm'])->name('tasks.create');
Route::post('/folders/{id}/tasks/create', [TaskController::class, 'create']);

// edit a task
Route::get('/folders/{id}/tasks/{task_id}/edit', [TaskController::class, 'showEditForm'])->name('tasks.edit');
Route::post('/folders/{id}/tasks/{task_id}/edit', [TaskController::class, 'edit']);
