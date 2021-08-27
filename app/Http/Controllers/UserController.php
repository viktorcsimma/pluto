<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function setLocale($locale)
    {
        App::setlocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
