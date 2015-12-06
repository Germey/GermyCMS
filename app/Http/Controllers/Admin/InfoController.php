<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use View, Auth, Flash;
use App\Model\User;
use App\Http\Requests\InfoRequest;

class InfoController extends Controller {

    /**
     * The pre name of view
     *
     * @var array
     */
    private $preView = 'admin.info.';

    /**
     * ArticleController constructor.
     */
    public function __construct() {
        $this->middleware('auth.admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        if ($user = Auth::user()) {
            return View::make($this->getView('index'))->withUser($user);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Request $request,$id) {
        var_dump($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(User $user) {
        if ($this->isMe($user)) {
            return View::make($this->getView('edit'))->withUser($user);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * Mark: Because the relation is hasOne, info returns an Object not a Collection,
     * So it works, or if the relation is hasMany, info returns a Collection Object,
     * It will not work
     *
     * Mark: If it is not an object,Calling update will ignore fillable variable.
     *
     * @param  int $id
     * @return Response
     */
    public function update(InfoRequest $request, User $user) {
        if ($this->isMe($user)) {
            if ($user->info->update($request->all())) {
                Flash::success('修改成功！');
                return View::make($this->getView('edit'))->withUser($user);
            } else {
                Flash::error('修改失败！');
                return Redirect::back()->withInput();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

    /**
     * Get Name of View
     *
     * @return ViewName
     */
    public function getView($name) {
        return $this->preView . $name;
    }

    /**
     * @param User $user
     * @return bool
     */
    private function isMe(User $user) {
        return $user->id == Auth::user()->id;
    }

}
