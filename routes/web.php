<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\TaskController;
use App\Models\Folder;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => 'auth'], function() {
  Route::get('/', [HomeController::class, 'index'])->name('home');

  // create new folder
  // Route::get('/folders/create', 'App\Http\Controllers\FolderController@showCreateFrom')->name('folders.create');
  Route::get('/folders/create', [FolderController::class, 'showCreateFrom'])->name('folders.create');
  Route::post('/folders/create', [FolderController::class, 'create']);

  Route::group(['middleware' => 'can:view,folder'], function() {
    // top page
    Route::get('folders/{folder}/tasks', [TaskController::class, 'index'])->name('tasks.index');
  });

  // create new task
  Route::get('/folders/{folder}/tasks/create', [TaskController::class, 'showCreateForm'])->name('tasks.create');
  Route::post('/folders/{folder}/tasks/create', [TaskController::class, 'create']);

  // edit a task
  Route::get('/folders/{folder}/tasks/{task}/edit', [TaskController::class, 'showEditForm'])->name('tasks.edit');
  Route::post('/folders/{folder}/tasks/{task}/edit', [TaskController::class, 'edit']);
});

Auth::routes();
