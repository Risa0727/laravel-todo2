<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <header>
    <nav class='my-navbar'>
      <a class='my-navbar-brand' href='/'>ToDo APP</a>
    </nav>
  </header>
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="card">
            <div class="card-header">Add Task</div>
            <div class="card-body">
              @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $msg)
                    <p>{{ $msg }}</p>
                  @endforeach
                </div>
              @endif
              <form action="{{ route('tasks.create', ['id' => $folder_id]) }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="title">Task Name</label>
                  <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
                </div>
                <div class="form-group">
                  <label for="due_date">Deadline</label>
                  <input type="text" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') }}" />
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">ADD</button>
                </div>
              </form>
            </div>
          </nav>
        </div>
      </div><!-- row -->
    </div><!-- container -->
  </main>
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
  <script>
    flatpickr(document.getElementById('due_date'), {
      // locale: 'en',
      dateFormat: 'j F Y',
      minDate: new Date(),
    });
  </script>
</body>
