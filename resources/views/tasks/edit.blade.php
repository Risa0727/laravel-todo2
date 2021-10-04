
@extends('layout')

@section('style')
  @include('share.flatpickr.style')
@endsection

@section('main')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card">
          <div class="card-header">Edit Task</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $msg)
                  <p>{{ $msg }}</p>
                @endforeach
              </div>
            @endif
            <form
              action="{{ route('tasks.edit', ['folder'=> $task->folder_id, 'task'=> $task->id])}}"
              method="post"
            >
              @csrf
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title"
                       {{-- value="{{ old('title') ?? $task->title }}"/> --}}
                       value="{{ old('title', $task->title) }}"/>
              </div>
              <div class="form-group">
                <label for="status">status</label>
                <select name="status" id="status" class="form-control">
                  @foreach(\App\Models\Task::STATUS as $key => $val)
                    <option
                      value="{{ $key }}"
                      {{ $key == old('status', $task->status) ? 'selected' : '' }}
                    >{{ $val['label'] }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="due_date">Deadline</label>
                <input type="text" class="form-control" name="due_date" id="due_date"
                       {{-- value="{{ old('due_date') ?? $task->formatted_due_date }}"/> --}}
                       value="{{ old('due_date', $task->formatted_due_date) }}"/>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div><!-- row -->
  </div><!-- container -->
@endsection

@section('script')
  @include('share.flatpickr.script')
@endsection
