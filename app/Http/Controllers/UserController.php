<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $token = $request->bearerToken();

        return $token->user()->first();
    }

    public function destroy(User $user)
    {

        try {
            $user->delete();
        } catch (\Exception $exception) {
            return response($exception->getMessage(), 400);
        }

        return response('User delete successfully', 200);
    }

    public function getReferrals(Request $request)
    {

        $token = $request->bearerToken();

        return $token->user()
                     ->first()
                     ->referralUsers()
                     ->get();
    }

    public function getWins(Request $request)
    {

        return $request->user->completedRounds()
                             ->get();
    }

}
