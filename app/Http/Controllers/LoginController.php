<?php

namespace App\Http\Controllers;

use App\Models\Utenti;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function ViewLogin(){
        if(Session::has('email')){
           return redirect('HomePage');
        }
        return view('Login');
    }
    public function Login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $utente = Utenti::where('Username', $username)->first();
        if($utente && password_verify($password,$utente->Password)){
            Session::put('email',$utente->Email);
            return redirect('HomePage');
        }
        else{
            return redirect('/');
        }
    }
}
