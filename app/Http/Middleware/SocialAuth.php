<?php

namespace App\Http\Middleware;

use App\Token;
use Carbon\Carbon;
use Closure;

class SocialAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();
        $tokenFromDB = Token::where('token', $token)->first();

        if (!$tokenFromDB) {

            return response('Unauthorized', 401);
        }

        $currentDate = Carbon::now($tokenFromDB->created_at);
        $expireAt = Carbon::createFromDate($tokenFromDB->created_at)->addSeconds($tokenFromDB->expires_in);

        if (!$token || ($currentDate > $expireAt)) {

            return response('Unauthorized', 401);
        }

        $request->user = $tokenFromDB->user()->first();

        return $next($request);
    }
}
