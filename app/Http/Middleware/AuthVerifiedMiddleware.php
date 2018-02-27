<?php

namespace App\Http\Middleware;

use Closure;
use App\Customer;

class AuthVerifiedMiddleware
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
		$customer_id = $request->session()->get('userid');
		$customer = Customer::find($customer_id);
		if($customer->verified_status != 1){
			return redirect('/verified');
		}
        return $next($request);
    }
}
