<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends BaseAuthController
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
        $data = Socialite::driver('vkontakte')->user();

        return $this->callbackSocialNetworks($data);
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
        $data = Socialite::driver('odnoklassniki')->user();

        return $this->callbackSocialNetworks($data);
    }


}
