<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title' => 'required|max:40',
            'subtitle' => 'required|max:80',
            'summary' => 'required|max:300',
            'content' => 'required',
            'weight' => 'required|integer',
            'allow_comment' => 'required|boolean',
        ];
    }

}
