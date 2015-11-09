<?php namespace App\Http\Middleware;

use App\Model\Tag;
use Closure, Redirect;


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
        $id = $request->route()->getParameter('tag');
        $tag = Tag::find($id);
        if ($method == 'edit' && !$tag->editable()) {
            return Redirect::back()->with("error", "该标签不能被编辑");
        }
        if ($method == 'destroy' && !$tag->deletable()) {
            return Redirect::back()->with("error", "该标签不能被删除");
        }

        return $next($request);
    }


}
