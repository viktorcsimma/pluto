<?php

namespace App\Http\Controllers;

use App;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function setLocale($locale)
    {
        App::setlocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function index()
    {
        $user = auth()->user(); //get the authenticated user
        $users = User::all(); //get all users
        return view('auth.user', ['user' => $user, 'users' => $users]);
    }

}
