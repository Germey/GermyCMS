<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Article;
use Redirect, Input, Auth, Validator, View;
use Illuminate\Http\Request;

class ArticleController extends Controller {


    private $preView = 'admin.article.';

    /**
     * Get Name of View
     *
     * @return ViewName
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
     * @return Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:40',
            'subtitle' => 'required|max:80',
            'summary' => 'required|max:300',
            'content' => 'required',
            'weight' => 'required|integer',
            'allow_comment' => 'boolean',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        }
        if ($article = Article::create($request->all())) {
            return View::make($this->getView('edit'))->with('success', '发布成功！')->withArticle($article);
        } else {
            return View::make($this->getView('create'))->with('error', '发布失败');
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
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:40',
            'subtitle' => 'required|max:80',
            'summary' => 'required|max:300',
            'content' => 'required',
            'weight' => 'required|integer',
            'allow_comment' => 'boolean',
        ]);
        if ($validator->fails()) {
            return View::make($this->getView('edit'))->withArticle(Article::find($id))->withErrors($validator->errors());
        }
        $article = Article::find($id);
        if ($article->update($request->all())) {
            return View::make($this->getView('edit'))->with('success', '修改成功！')->withArticle(Article::find($id));
        } else {
            return View::make($this->getView('edit'))->with('error', '修改失败！')->withArticle(Article::find($id));
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
