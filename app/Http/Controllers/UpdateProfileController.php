<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    public function index($id)
    {
        $user = User::where('id', $id)->first();

        if (empty($user)) {
            return redirect()->route('home');
        }

        return view('updateProfile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        User::where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('show', $user->id);
    }
}
