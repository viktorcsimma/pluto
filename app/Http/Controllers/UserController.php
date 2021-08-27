<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function setLocale($locale)
    {
        App::setLocale($locale);
        return redirect()->back()->cookie('locale', $locale, config('app.locale_cookie_lifespan'));
    }
}
