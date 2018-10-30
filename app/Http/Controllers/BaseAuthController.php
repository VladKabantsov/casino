<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BaseAuthController extends Controller
{
    public function callbackSocialNetworks($data) {
        $user = new User($data[ 'user' ]);
        $user->referal_reference = $this->generateReference($user->vk_id ? $user->vk_id : $user->ok_id);
        $user->save();
        $user->token()->create($data[ 'token' ]);

        return $user->load('token');
    }

    public function generateReference($id) {
        return str_random(50) . Hash::make($id);
    }
}
