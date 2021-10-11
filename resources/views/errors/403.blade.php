@extends('layout')

@section('main')
  <div class='container'>
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-8">
        <div class="text-center">
          <p class="display-1"> 403</p>
          <h2>Access Denied</h2>
          <p class="h3 mb-2">You do not have permission to view this page.</p>
          <a href="{{ route('home') }}" class="btn btn-primary">Back To Home</a>
        </div>
        <p>

        </p>

      </div>
    </div>
  </div>
@endsection
