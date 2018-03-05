<?php

namespace App\Http\Controllers;

use Socialite;

class SocialController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('facebook')->user();

        return ($user->getEmail());
    }
}
