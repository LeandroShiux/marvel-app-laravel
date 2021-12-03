<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request){

        auth()->logout();

        //Comando usado para invalidar sessões em outros dispositivos
        //Auth::logoutOtherDevices($currentPassword);
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        

        return redirect()->route('home');
    }


}



