@extends('layout')

@section('main')
  <div class="container">
    <div class="row justify-content-center">
      <nav class="card">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
          @if(session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <form action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" class="form-control" id="email" name="email"
                     value="{{ old('email') }}" required
                     autocomplete="email" autofocus />
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
@endsection
