<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    * 以下のファイルをオーバーライドしている
    * C:\xampp\htdocs\00\laravel-todo2\vendor\laravel\ui\auth-backend\AuthenticatesUsers.php
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function username()
    {
      return 'email_or_id';
    }

    function attemptLogin(Request $request)
    {
      $email_or_id = $request->input($this->username());
      var_dump($email_or_id);
      $password = $request->input('password');

      if(filter_var($email_or_id, \FILTER_VALIDATE_EMAIL)) {
        $credentials = ['email' => $email_or_id, 'password' => $password];
      } else {
        $credentials = ['name' => $email_or_id, 'password' => $password];
      }

      return $this->guard()->attempt($credentials, $request->filled('remember'));
    }
}
