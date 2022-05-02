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

        $permissions = [
            'users', 'customers', 
            'products-categories', 'brands', 'products', 
            'sold_products', 'orders',
            'promotions', 'promo',
            'shipping', 'fees', 'taxes', 'order_status',
        ];
        // dd($request->routeIs('admin.orders.*'), $request->route()->getName(), $request->method());
        foreach($permissions as $permission) {
            if ($request->routeIs('admin.' . $permission . '.*')) {
                if ($request->isMethod('get') && auth()->user()->isAbleTo($permission . '_*')) {
                    return $next($request);
                }
                
                if ($request->isMethod('post') && auth()->user()->isAbleTo($permission . '_add')) {
                    return $next($request);
                }

                if ($request->isMethod('put') && auth()->user()->isAbleTo($permission . '_edit')) {
                    return $next($request);
                }

                if ($request->isMethod('delete') && auth()->user()->isAbleTo($permission . '_delete')) {
                    return $next($request);
                }
            }
        }// end :: foreach 

        
        session()->flash('has_no_permission', true);
        return redirect()->route('admin.error.no_permission');
    }
}
