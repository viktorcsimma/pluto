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

    public function userc() {
      return view('user', ['current_user' => auth()->user(), 'all_users' => User::all()]);
    }
}
