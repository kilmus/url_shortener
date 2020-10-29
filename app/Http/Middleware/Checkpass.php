<?php

namespace App\Http\Middleware;

use App\Models\url;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
        //dd($request->url);
        $count = url::where('url_code', $request->url)->firstORFail();
        if ($count->url_password != null) {
            //dd($count->url_password);
            //dd($count);
            return view('url.password', [
                'url' => $request->url,
            ]);
        }
        return $next($request);
    }
}
