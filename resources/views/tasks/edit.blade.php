
@extends('layout')

@section('style')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('main')
  <div class="container">
    <div class="row">
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
              action="{{ route('tasks.edit', ['id'=> $task->folder_id, 'task_id'=> $task->id])}}"
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
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
  <script>
    flatpickr(document.getElementById('due_date'), {
      // locale: 'en',
      dateFormat: 'j F Y',
      minDate: new Date(),
    });
  </script>
@endsection
