<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Folder;
use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{
    public function showCreateFrom()
    {
      return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
      $folder = new Folder;
      $folder->title = $request->title;
      Auth::user()->folders()->save($folder);

      return redirect()->route('tasks.index', [
        'folder' => $folder->id,
      ]);
    }

}
