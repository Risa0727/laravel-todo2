@extends('layout')

@section('main')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card">
          <div class="card-header">Login</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $msg)
                  <p>{{ $msg }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('login') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control"
                       id="email" name="email"
                       value="{{ old('email') }}"
                />
             </div>
             <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control"
                      id="password" name="password">
             </div>
             <div class="text-center">
               <button type="submit" class="btn btn-primary">Login</button>
             </div>
            </form>
          </div>
        </nav>
        <div class="text-center">
          <a href="{{ route('password.request') }}">Forgot Your Password?</a>
        </div>
      </div>
    </div>
  </div><!-- container -->
@endsection
