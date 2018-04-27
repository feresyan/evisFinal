<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class manager
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
        $userId = Auth::id();
        $user = User::find($userId);

        if($userId == NULL)
        {
            return redirect(route('login'));
        }
        elseif($user->status == 'manager')
        {
            return $next($request);
        }
        return redirect()->back();
    }
}
