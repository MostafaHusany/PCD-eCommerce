<?php

namespace App\Http\Middleware;

use Closure;

class AdminPermissionsMiddleware
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
        if($request->routeIs('admin.error.no_permission')) {
            return $next($request);
        }

        if (auth()->user()->hasRole('admin')) {
            return $next($request);
        }

        if ($request->routeIs('admin.users.*')) {
            if ($request->isMethod('get') && auth()->user()->isAbleTo('user_*')) {
                return $next($request);
            }

            if ($request->isMethod('post') && auth()->user()->isAbleTo('user_add')) {
                return $next($request);
            }

            if ($request->isMethod('put') && auth()->user()->isAbleTo('user_edit')) {
                return $next($request);
            }

            if ($request->isMethod('delete') && auth()->user()->isAbleTo('user_delete')) {
                return $next($request);
            }
        }

        
        session()->flash('has_no_permission', true);
        return redirect()->route('admin.error.no_permission');
    }
}
