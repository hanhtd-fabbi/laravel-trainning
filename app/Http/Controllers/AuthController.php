<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginReq;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginReq $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!empty($user) && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('home');
        } else {
            Session::flash('error', 'Login fail');
            return redirect()->back()->withInput($request->all());
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }
}
