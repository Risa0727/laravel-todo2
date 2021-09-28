@extends('layout')

@section('main')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card">
          <div class="card-header">
            Let's create a folder
          </div>
          <div class="card-body">
            <div class="text-center">
              <a href="{{ route('folders.create') }}" class="btn btn-primary">Create a Folder</a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div><!-- container -->

@endsection
