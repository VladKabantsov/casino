<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;

class BaseAuthController extends Controller
{
    public function callbackSocialNetworks($data)
    {

        $user = $data->user;
        $user['referral_reference'] = $this->generateReference($user['vk_id'] ? $user['vk_id'] : $user['ok_id']);
        $user = User::updateOrCreate([
            'screen_name' => $user['screen_name']
        ], $user);
        $user->token()->updateOrCreate([
            'user_id' => $user->id
        ], $data->accessTokenResponseBody);

        return $user->load('token');
    }

    public function generateReference($id)
    {
        return str_random(50) . Hash::make($id);
    }
}
