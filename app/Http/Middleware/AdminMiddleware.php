<?php namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;

use Closure;

class AdminMiddleware {

    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if (($this->auth->user()->whereHas('roles', function ($q)
        {
            $q->where('role_id','==', 1);
        })->get()))
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return response('Unat');
            }
        }

		return $next($request);
	}

}
