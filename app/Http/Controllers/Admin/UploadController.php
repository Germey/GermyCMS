<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller {


    /**
     * img allowed type
     *
     * @var array
     */
    public $allowImgType = ['jpg', 'png', 'jpeg', 'gif'];

    /**
     * The pre name of view
     *
     * @var array
     */
    public $storagePath = '/storage/app/';

    /**
     *
     */
    public function ajaxUploadInfoImg(Request $request) {

        //dd($request->all());
        //判断请求中是否包含name=file的上传文件
        if(!$request->hasFile('image')){
            echo "0";
            return;
        }

        $file = $request->file('image');
        if (!$this->isAllowed($file->getMimeType(), $this->allowImgType)) {
            echo "1";
            return;
        }

        //判断文件上传过程中是否出错
        if(!$file->isValid()) {
            echo "2";
            return;
        }

        $newFileName = md5(time().rand(0,10000)).'.'.$file->getClientOriginalExtension();

        $savePath = '/test/'.$newFileName;
        $bytes = Storage::put(
            $savePath,
            file_get_contents($file->getRealPath())
        );
        if(!Storage::exists($savePath)){
            echo '3';
            return;
        }
        echo $this->getAbsolutePath($savePath);
    }

    /**
     * Return if type is allowed.
     *
     * @param $type
     * @param array $allow_types
     * @return bool
     */
    private function isAllowed($type, array $allow_types) {
        foreach ($allow_types as $allow_type) {
            if (strstr($type, $allow_type)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $savePath
     */
    private function getAbsolutePath($savePath) {
        return $this->storagePath . $savePath;
    }

}
