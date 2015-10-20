<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Tag;
use Redirect, Input, Auth;

class TagController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return view('admin.tag.index')->withTags(Tag::paginate(15));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('admin.tag.create')->withTags(Tag::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required|max:255',
			'parent' => 'required',
		]);

		$tag = new Tag;
		$tag->name = Input::get('name');
		$tag->parent = Input::get('parent');

		if ($tag->save()) {
			return Redirect::to('admin/tag')->with('success','添加成功！');
		} else {
			return Redirect::back()->withInput()->with('errors','添加失败！');
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		return view('admin.tag.edit')->with("thisTag", Tag::find($id))->withTags(Tag::all());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id) {
		$this->validate($request, [
			'name' => 'required',
			'parent' => 'required',
		]);

		$tag = Tag::find($id);

		$tag->name = Input::get('name');
		$tag->parent = Input::get('parent');

		if ($tag->save()) {
			return Redirect::to('admin/tag')->with('success','修改成功！');
		} else {
			return Redirect::back()->withInput->with('errors', '修改失败！');
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$tag = Tag::find($id);
		if ($tag->delete()) {
			return Redirect::to('admin/tag')->with('success','删除成功！');
		} else {
			return Redirect::to('admin/tag')->with('errors', '删除失败！');
		}

	}

}
