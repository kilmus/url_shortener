<?php

namespace App\Http\Middleware;

use App\Models\url;
use Closure;
use Illuminate\Http\Request;

class Checkpass
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
        $pass = url::where('url_code', $request)->firstORFail();
        dd($pass);
        return $next($request);
    }
}
