<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;
use App\HTTP\Requests\CreateTaskRequest;
use App\HTTP\Requests\EditTaskRequest;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(Folder $folder)
    {
      if (Auth::user()->name == 'admin') {
        $folders = Folder::all();
      } else {
        $folders = Auth::user()->folders()->get();
      }

      $tasks = $folder->tasks()->get();

      // return dd($folders);
      return view('tasks/index', [
        'folders' => $folders,
        'current_folder_id' => $folder->id,
        'tasks' => $tasks,
      ]);
    }

    /**
     * GET /folders/{id}/tasks/create
     */
    public function showCreateForm(Folder $folder)
    {
      return view('tasks/create', [
        'folder_id' => $folder->id
      ]);
    }

    public function create(Folder $folder, CreateTaskRequest $request)
    {
      $carbon = new Carbon($request->due_date);

      $task = new Task();
      $task->title = $request->title;
      $task->due_date = $carbon->toDate();

      $folder->tasks()->save($task);

      return redirect()->route('tasks.index', ['folder'=> $folder->id]);
    }

    /**
     * GET /folders/{id}/tasks/{task_id}/edit
     */
    public function showEditForm(Folder $folder, Task $task)
    {

      return view('tasks/edit', [
        'task' => $task,
      ]);
    }

    public function edit(Folder $folder, Task $task, EditTaskRequest $request)
    {

      $task->title = $request->title;
      $task->status = $request->status;

      $carbon = new Carbon($request->due_date);
      $task->due_date = $carbon->toDate();
      $task->save();

      return redirect()->route('tasks.index', [
        'folder' => $task->folder_id,
      ]);
    }

}
