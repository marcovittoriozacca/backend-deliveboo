<?php

namespace App\Http\Middleware;

use App\Models\Dish;
use App\Models\Restaurant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkUserRestaurant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $user = Auth::id();
        $dish = $request->segment(2);
        $check_dish = Dish::where('restaurant_id', $user)->where('slug', $dish)->get();
        if(count($check_dish) == 0 && $dish != null && $dish !== 'create' ){
            abort(403, 'Accesso non autorizzato');
        }

        return $next($request);
    }
}
