<?php namespace App\Http\Middleware;

use App\Model\Tag;
use Closure, Redirect, Flash;


class TagMiddleware extends BaseMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $method = $this->getActionMethod($request);
        $tag = $request->route()->getParameter('tag');
        if ($method == 'edit' && !$tag->editable()) {
            Flash::error('该标签不能被编辑！');
            return Redirect::back();
        }
        if ($method == 'destroy' && !$tag->deletable()) {
            Flash::error('该标签不能被删除！');
            return Redirect::back();
        }

        return $next($request);
    }


}
