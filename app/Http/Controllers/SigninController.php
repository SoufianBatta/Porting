<?php

namespace App\Http\Controllers;

use App\Models\Utenti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SigninController extends Controller
{
    public function ViewSignin(){
        if(Session::has('email')){
            return redirect('HomePage');
         }
        return view('Signin');
    }
    public function Signin(Request $request){
        $nome = $request->input('nome');
        $cognome = $request->input('cognome');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $username = $request->input('username');
        $password = $request->input('password');
        $values = [
            'Email' => $email,
            'Password' => password_hash($password,PASSWORD_BCRYPT),
            'Username' => $username,
            'Nome' => $nome,
            'Telefono' => $telefono,
            'Cognome' => $cognome
        ];
        if (Utenti::where('Email', $email)->orWhere('Username', $username)->get()->isEmpty()) {
            Utenti::unguard();
            Utenti::create($values);
            Utenti::reguard();
            Session::put('email', $email);
            return redirect('HomePage');
        }
        else{
            return redirect('/');
        }
    }
}
