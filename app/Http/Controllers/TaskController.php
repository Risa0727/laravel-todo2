<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;
use App\HTTP\Requests\CreateTaskRequest;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(int $id)
    {
      $folders = Folder::all();
      $current_folder = Folder::find($id);

      $tasks = $current_folder->tasks()->get();

      // return dd($folders);
      return view('tasks/index', [
        'folders' => $folders,
        'current_folder_id' => $id,
        'tasks' => $tasks,
      ]);
    }

    /**
     * GET /folders/{id}/tasks/create
     */
    public function showCreateForm(int $id)
    {
      return view('tasks/create', [
        'folder_id' => $id
      ]);
    }

    public function create(int $id, CreateTaskRequest $request)
    {
      $carbon = new Carbon($request->due_date);

      $current_folder = Folder::find($id);

      $task = new Task();
      $task->title = $request->title;
      $task->due_date = $carbon->toDate();

      $current_folder->tasks()->save($task);

      return redirect()->route('tasks.index', ['id'=> $current_folder->id]);
    }

    /**
     * GET /folders/{id}/tasks/{task_id}/edit
     */
    public function showEditForm(int $id, int $task_id)
    {
      $task = Task::find($task_id);

      return view('tasks/edit', [
        'task' => $task,
      ]);
    }
}
