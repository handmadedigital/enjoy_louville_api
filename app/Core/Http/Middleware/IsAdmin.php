<?php

namespace ThreeAccents\Core\Http\Middleware;

use Closure;
use Tymon\JWTAuth\JWTAuth;

class IsAdmin
{
    /**
     * The Guard implementation.
     *
     * @var JWTAuth
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  JWTAuth  $auth
     */
    public function __construct(JWTAuth $auth)
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
        if (! $user = $this->auth->parseToken()->authenticate()) return response()->json(['user_not_found'], 404);

        if($user->is_admin === 0) return response()->json(['user_is_not_admin'], 403);

        return $next($request);
    }
}
