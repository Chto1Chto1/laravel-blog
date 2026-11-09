<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
public function handle(Request $request, Closure $next)
   {
       if (Auth::check() && Auth::user()->is_admin) {
           // отметка для CKFinder: администратор вошёл
           if (session_status() === PHP_SESSION_NONE) {
               session_start();
           }
           $_SESSION['ckfinder_admin'] = true;
           session_write_close();

           return $next($request);
       }

       abort(404);
   }    
}