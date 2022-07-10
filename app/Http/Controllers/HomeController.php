<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show(User $user, Game $game)
    {
        $role = Auth::user()->roles->role;
        if($role == "Admin") {
            $users = $user->with('roles')->get();
            $games = $game->get();
            return view('admin.profile', compact('users', 'games'));
        } else {
            return view('user.profile');
        }

    }
}
