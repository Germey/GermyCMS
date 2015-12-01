<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Model\Article;
use App\Model\Tag;
use Redirect, Input, Auth, Validator, View, Flash;
use Illuminate\Http\Request;


class ArticleController extends Controller {


    private $preView = 'admin.article.';

    /**
     * ArticleController constructor.
     */
    public function __construct() {
        $this->middleware('article', ['only' => ['store', 'update']]);
    }


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
        return View::make($this->getView('create'))->withTags(Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request) {
        if ($article = $this->createArticle($request)) {
            Flash::success('发布成功！');
            return View::make($this->getView('edit'))->withArticle($article)->withTags(Tag::all());
        } else {
            Flash::error('发布失败！');
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
        return View::make($this->getView('edit'))->withArticle($article)->withTags(Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(ArticleRequest $request, Article $article) {
        if ($article = $this->updateArticle($request, $article)) {
            Flash::success('修改成功！');
            return View::make($this->getView('edit'))->withArticle($article)->withTags(Tag::all());
        } else {
            Flash::error('修改失败！');
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
            Flash::success('删除成功！');
            return Redirect::to('admin/article');
        } else {
            Flash::error('删除失败！');
            return Redirect::to('admin/article');
        }
    }

    /**
     * sync all tags.
     *
     * @param ArticleRequest $request
     * @param Article $article
     */
    private function syncTags(Article $article, array $tags) {
        $article->tags()->sync($tags);
    }


    /**
     * Create article method.
     *
     * @param ArticleRequest $request
     * @return mixed
     */
    private function createArticle(ArticleRequest $request) {
        $article = Auth::user()->articles()->create($request->all());
        $this->syncTags($article, $request->input('tag_list', []));
        return $article;
    }


    /**
     * Update article method.
     *
     * @param ArticleRequest $request
     * @param Article $article
     * @return Article
     */
    private function updateArticle(ArticleRequest $request, Article $article) {
        $article->update($request->all());
        $this->syncTags($article, $request->input('tag_list', []));
        return $article;
    }


}
