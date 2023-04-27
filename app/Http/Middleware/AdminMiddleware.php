<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if(Auth::check()) {
    //         //admin role ==1
    //         //user role ==0
    //         if(Auth::user()->role == 1) {
    //             return $next($request);
    //         }else{
    //             return redirect('/home')->with('message','You are not admin');
    //         }
    //         }else{
    //             return redirect('/login')->with('message','login to access the website info');

    //         }

    // }
    public function handle(Request $request, Closure $next)
    {
        // dd($request);
        if (!Auth::check() || Auth::user()->role == false) {
            return Redirect::route('indexproduct');
        }
        return $next($request);
        
    }


}