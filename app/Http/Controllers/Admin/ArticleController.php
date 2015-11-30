<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Model\Article;
use Redirect, Input, Auth, Validator, View, Session;
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
            Session::flash('success', '发布成功！');
            return View::make($this->getView('edit'))->withArticle($article);
        } else {
            Session::flash('error', '发布失败！');
            return Redirect::back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Article $article) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Article $article) {
        return View::make($this->getView('edit'))->withArticle($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(ArticleRequest $request, Article $article) {
        if ($article->update($request->all())) {
            Session::flash('success', '修改成功！');
            return View::make($this->getView('edit'))->withArticle($article);
        } else {
            Session::flash('error', '修改失败！');
            return Redirect::back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Article $article) {
        if ($article->delete()) {
            Session::flash('success', '删除成功！');
            return Redirect::to('admin/article');
        } else {
            Session::flash('error', '删除失败！');
            return Redirect::to('admin/article');
        }
    }

}
