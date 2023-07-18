<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{
    public function ViewHomePage(){
        if (!Session::has('email')) {
            return redirect('/');
        }
        return view('Homepage');
    }
    public function Logout(){
        Session::flush();
        return redirect('/');
    }
}
