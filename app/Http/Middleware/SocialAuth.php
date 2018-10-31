<?php

namespace App\Http\Middleware;

use App\Token;
use Carbon\Carbon;
use Closure;
use function MongoDB\BSON\toJSON;

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
        $tokenFromDB = Token::where('access_token', $token)->first();

        if (!$tokenFromDB) {

            return response('Unauthorized', 401);
        }

        $currentDate = Carbon::parse($tokenFromDB->created_at);
        $expireAt = clone Carbon::parse($currentDate)->addSeconds($tokenFromDB->expires_in);

        if (!$token || ($currentDate > $expireAt)) {

            return response('Unauthorized', 401);
        }

        $request->user = $tokenFromDB->user()->first();

        return $next($request);
    }
}
