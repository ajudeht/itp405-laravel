<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Closure;

class MaintenanceMode
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
        $mm = DB::table('configurations')->where('name', '=', 'maintenance')->first();

        if ($mm->value == "on"){
          return redirect('maintenance');
        } else {
          return $next($request);
        }
    }
}
