<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function switchAccount($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        Auth::logout();
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Account switched successfully.');
    }
}