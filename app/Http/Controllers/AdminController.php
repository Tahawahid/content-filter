<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('dashboard.admin.home');
    }
    public function signIn()
    {
        return view('dashboard.admin.signin');
    }
}
