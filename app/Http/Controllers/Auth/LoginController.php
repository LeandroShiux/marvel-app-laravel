<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;



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
    */

    use AuthenticatesUsers;
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(){
        $this->middleware('signed')->only('verify');
        $this->middleware('guest');
    }

    public function index(){
        return view('auth/login');
    }

    public function login(Request $request){

        $this->validate($request,[
            'username' => 'required|max:255',
            'password' => 'required',
        ]);

        $remember = $request->input('remember_token');

        if(!auth()->attempt($request->only('username','password'),$remember)){
            return back()->with('status','Invalid credentials');
        }
        
        auth()->attempt($request->only('username','password'));

        $currentPassword = $request->input('password');
        auth()->logoutOtherDevices($currentPassword);
        $request->session()->regenerate();
        
        return redirect()->intended('/');
    }

    public function accessAdmin(){
        if(Gate::allows('access')){
            return view('authentication/admin');
        } 
        
        if(Gate::denies('access')){
            return "<h2>Esta rota só é permitida para ADMs</h2>";
        }
    }


}
