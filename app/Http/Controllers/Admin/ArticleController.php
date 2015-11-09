<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Model\Article;
use Redirect, Input, Auth, Validator, View;
use Illuminate\Http\Request;


class ArticleController extends Controller {


    private $preView = 'admin.article.';

    /**
     * Get view name by name
     *
     * @param $name
     * @return string
     */
    public function getView($name) {
        return $this->preView . $name;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return View::make($this->getView('index'))->withArticles(Article::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make($this->getView('create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request) {
        if ($article = Article::create($request->all())) {
            return View::make($this->getView('edit'))->with('success', '发布成功！')->withArticle($article);
        } else {
            return Redirect::back()->withInput()->with('error', '发布失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        return View::make($this->getView('edit'))->withArticle(Article::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(ArticleRequest $request, $id) {
        $article = Article::find($id);
        if ($article->update($request->all())) {
            return View::make($this->getView('edit'))->with('success', '修改成功！')->withArticle($article);
        } else {
            return Redirect::back()->withInput()->with('error', '修改失败！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $article = Article::find($id);
        if ($article->delete()) {
            return Redirect::to('admin/article')->with('success', '删除成功！');
        } else {
            return Redirect::to('admin/article')->with('error', '删除失败！');
        }
    }

}
