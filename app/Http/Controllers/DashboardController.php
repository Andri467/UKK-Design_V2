<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Todolist;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Fetch all users (you can filter this as needed)
        $users = User::all();

        // Fetch to-do lists for the authenticated user
        $todolists = Todolist::where('user_id', Auth::id())->get();

        // Get today's date
        $hariIni = now()->format('d F Y');

        // Pass data to the view
        return view('dashboard', compact('users', 'todolists', 'hariIni'));
    }
}