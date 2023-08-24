<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::where('email', '!=', 'admin@admin.com')->get();

        return view('home', compact('users'));
    }

    public function destroy($id)
    {

        $user = User::where('id', $id)->first();

        if (!empty($user)) {
            $user->delete();
        }

        return redirect()->route('home');
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();

        if (empty($user)) {
            return redirect()->route('home');
        }

        return view('profile', compact('user'));
    }
}
