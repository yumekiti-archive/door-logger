<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Auth\AuthenticationException;

class CheckDeviceToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $device = Device::where('token', '=', $token)->first();
        if($device == null){
            throw new AuthenticationException();
        }
        $request->device = $device;
        return $next($request);
    }
}
