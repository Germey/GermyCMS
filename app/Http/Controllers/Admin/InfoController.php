<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use View, Auth;
use App\Model\User;

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
    public function show($id) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(User $user) {
        if ($user->id == Auth::user()->id) {
            return View::make($this->getView('edit'))->withUser($user);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {
        //
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

}
