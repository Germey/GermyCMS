<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller {


    /**
     * img allowed type
     *
     * @var array
     */
    protected $allowedType = ['image' => ['jpg', 'png', 'jpeg', 'gif']];

    /**
     * The pre name of view
     *
     * @var array
     */
    protected $storagePath = ['image' => 'upload/images/'];


    /**
     * Ajax Upload Img
     *
     * @param Request $request
     * @return mixed
     */
    public function ajaxUploadInfoImg(Request $request) {
        return $this->uploadImg($request);
    }

    /**
     * Return AllowedType.
     *
     * @return array
     */
    public function getAllowedType($type) {
        if ($type == 'all') {
            return $this->allowedType;
        }
        if (array_key_exists($type, $this->allowedType)) {
            return $this->allowedType[$type];
        }
        return [];
    }

    /**
     * Return storagePath by type.
     *
     * @return array
     */
    public function getStoragePath($type) {
        if ($type == 'all') {
            return $this->storagePath;
        }
        if (array_key_exists($type, $this->storagePath)) {
            return $this->storagePath[$type];
        }
        return [];
    }


    /**
     * Get the asset absolute path.
     *
     * @param $savePath
     * @param $newFileName
     * @return string
     */
    public function getAssetUri($savePath, $newFileName) {
        if (strpos($savePath, '/') === 0) {
            return $savePath . $newFileName;
        } else {
            return '/' . $savePath . $newFileName;
        }
    }

    /**
     * Upload image private method.
     *
     * @param Request $request
     * @return mixed
     */
    private function uploadImg(Request $request) {
        if (!$request->hasFile('image')) {
            return Response::json(['status' => 404]);
        }
        $file = $request->file('image');
        if (!in_array($file->getClientOriginalExtension(), $this->getAllowedType('image'))) {
            return Response::json(['status' => 403]);
        }
        if (!$file->isValid()) {
            return Response::json(['status' => 500]);
        }
        $newFileName = md5(time() . rand(0, 10000)) . '.' . $file->getClientOriginalExtension();
        $savePath = $this->getStoragePath('image');
        if ($file->move($savePath, $newFileName)) {
            return Response::json([
                'status' => 200,
                'path' => $this->getAssetUri($savePath, $newFileName),
            ]);
        }
    }

}
