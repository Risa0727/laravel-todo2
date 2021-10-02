@extends('layout')

@section('main')
    <div class='container'>
      <div class="row justify-content-center">
        <div class='col col-md-4'>
          <nav class="card">
            <div class='card-header'>Folder</div>
            <div class='card-body'>
              <a href='{{ route("folders.create")}}' class='btn btn-outline-secondary btn-block'>Add Folder</a>
            </div>
            <div class='list-group'>
              @foreach($folders as $folder)
                <a href="{{ route('tasks.index', ['id' => $folder->id ])}}"
                  class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}">
                  {{ $folder->title }}
                  @if ((Auth::check()) && (Auth::user()->name == "admin"))
                    <span style="font-weight:900;">- User: {{ $folder->user->name}}</span>
                  @endif
                </a>
              @endforeach
            </div>
          </nav><!-- card -->
        </div>
        <div class='col col-md-8'>
          <div class="card">
            <div class='card-header'>Task</div>
            <div class='card-body'>
              <div class='text-right'>
                <a href="{{ route('tasks.create', [ 'id' => $current_folder_id]) }}" class="btn btn-outline-secondary btn-block">Add Task</a>
              </div>
            </div>
            <table class='table'>
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Deadline</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($tasks as $task)
                  <tr>
                    <td>{{ $task->title }}</td>
                    <td><span class='label'>{{ $task->status_label }}</span></td>
                    <td>{{ $task->formatted_due_date }}</td>
                    <td><a href="{{ route('tasks.edit', ['id'=>$current_folder_id, 'task_id'=> $task->id]) }}">Edit</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- card -->
        </div><!-- column col-md-8 -->
      </div>
    </div>
@endsection
