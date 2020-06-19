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
    public function handle($request, Closure $next, ...$role)
    {
        // dd($next);
        // dd($request->input());
        // dd($request->user());
        // dd($request->user()->roles->whereIn('name',$role)->first());
        
        // if(!$role=='User'){
            // if(!$request->user()->roles->whereIn('name',$role)->first()){
            if(!$request->user()->roles->whereIn('name','Admin')->first()){
                // return redirect()->route('home')->with('status','You are not Allowed');
                return redirect()->route('home');
             }
         
    
       return $next($request);
    

    }
}
