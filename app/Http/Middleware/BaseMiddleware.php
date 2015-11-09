<?php namespace App\Http\Middleware;

use Closure;

class BaseMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        return $next($request);
    }


    /**
     * Get method of action, like edit, destroy
     *
     * @param $request
     * @return mixed
     */
    public function getActionMethod($request) {
        $action = $request->route()->getAction();
        $controller = $action['controller'];
        if ($controller) {
            $method = explode('@', $controller);
            return end($method);
        }
    }


}
