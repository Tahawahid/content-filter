<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function signIn()
    {
        return view('frontend.sign-in');
    }

    public function signUp()
    {
        return view('frontend.sign-up');
    }

    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('dashboard.client.home');
            } else {
                return redirect()->route('frontend.signIn')->with('error', 'Invalid Credentials');
            }
        } else {
            return redirect()->route('frontend.signIn')->withErrors($validator)->withInput();
        }
    }

    public function userRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('frontend.signIn')->with('success', 'User Registered Successfully');
        } else {
            return redirect()->route('frontend.signUp')->withErrors($validator)->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('frontend.signIn');
    }
}
