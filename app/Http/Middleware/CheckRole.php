<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if($request->user() == null)
        {
            return redirect()->to('/');
        }
        if (! $request->user()->hasRole($permission)) {
            return redirect()->to('/');
        }
        return $next($request);
    }
}
