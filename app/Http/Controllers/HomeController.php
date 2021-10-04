<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Folder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      // Get a loging user
       $user = Auth::user();

       // Adminユーザーは全てのユーザーのフォルダ/タスクを表示
       if ($user->name === 'admin') {
         $folders = Folder::all();
         $first_folder =  $folders->first();
         $tasks = $first_folder->tasks()->get();

         return view('tasks/index', [
           'folders' => $folders,
           'current_folder_id' => $first_folder->id,
           'tasks' => $tasks,
         ]);
       }

       $folder = $user->folders()->first();
       if (is_null($folder)) {
         return view('home');
        }

       return redirect()->route('tasks.index', [
         'folder' => $folder->id,
       ]);
    }
}
