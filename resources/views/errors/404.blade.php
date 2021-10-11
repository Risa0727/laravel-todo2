@extends('layout')

@section('main')
  <div class='container'>
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-8">
        <div class="text-center">
          <img src="{{asset('images/404.png') }}" class="img-fluid w-50 mb-4"  alt="404 image" />
          <p class="h3 mb-2">The page you requested cannot be found.</p>
          <a href="{{ route('home') }}" class="btn btn-primary">Back To Home</a>
        </div>
        <p>

        </p>

      </div>
    </div>
  </div>
@endsection
