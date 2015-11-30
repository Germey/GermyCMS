<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = ['title', 'subtitle', 'summary', 'content', 'weight', 'allow_comment'];


	public function user() {
		return $this->belongsTo('App\Model\User');
	}

}
