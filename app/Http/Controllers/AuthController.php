<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Redirect to O2Auth vk.com
     *
     * @return mixed
     */
    public function vkAuth() {
        return Socialite::with('vkontakte')->redirect();
    }

    /**
     * Handle information about auth user from vk provider
     */
    public function vkUser() {
        $user = Socialite::driver('vkontakte')->user();
        dd($user);
    }

    /**
     * Redirect to O2Auth vk.com
     *
     * @return mixed
     */
    public function okAuth() {
        return Socialite::with('odnoklassniki')->redirect();
    }

    /**
     * Handle information about auth user from vk provider
     */
    public function okUser() {
        $user = Socialite::driver('odnoklassniki')->user();
        dd($user);
    }
}
