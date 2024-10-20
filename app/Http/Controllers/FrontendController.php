<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function signUp()
    {
        return view('frontend.sign-up');
    }

    public function signIn()
    {
        return view('frontend.sign-in');
    }

    public function forgetPassword()
    {
        return view('frontend.forget-password');
    }
}
