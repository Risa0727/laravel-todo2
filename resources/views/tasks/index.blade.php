<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  <!-- CSS only -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <header>
    <nav class='my-navbar'>
      <a class='my-navbar-brand' href='/'>ToDo APP</a>
    </nav>
  </header>
  <main>
    <div class='container'>
      <div class='row'>
        <div class='col col-md-4'>
          <nav class="card">
            <div class='card-header'>Folder</div>
            <div class='card-body'>
              <a href='#' class='btn btn-outline-secondary btn-block'>Add Folder</a>
            </div>
            <div class='list-group'>
              @foreach($folders as $folder)
                <a href="{{ route('tasks.index', ['id' => $folder->id ])}}"
                  class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}">
                  {{ $folder->title }}
                </a>
              @endforeach
            </div>
          </nav><!-- card -->
        </div>
        <div class='column col-md-8'>
          <div class="card">
            <div class='card-header'>Task</div>
            <div class='card-body'>
              <div class='text-right'>
                <a href="#" class="btn btn-outline-secondary btn-block">Add Task</a>
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
                    <td><a href='#'>Edit</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- card -->
        </div><!-- column col-md-8 -->
      </div>
    </div>



  </main>
</body>





</html>
