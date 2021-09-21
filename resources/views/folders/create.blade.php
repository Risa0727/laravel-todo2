
@extends('layout')

@section('main')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="card">
            <div class="card-header">Add Folder</div>
            <div class="card-body">
              @if($errors->any())
                <div class="alert alert-danger">
                  <ul class="m-auto p-0">
                    @foreach($errors->all() as $msg)
                      <li class="list-unstyled">{{ $msg }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="{{ route('folders.create') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="title">Folder Name</label>
                  <input type="text" class="form-control" name="title" id="title" />
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
@endsection
