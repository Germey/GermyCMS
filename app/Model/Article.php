<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['title', 'subtitle', 'summary', 'content', 'weight', 'allow_comment'];

	/**
	 * Get the user this article belongs to
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function user() {
		return $this->belongsTo('App\Model\User');
	}


	/**
	 * Return tags the article associated with
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function tags() {
		return $this->belongsToMany('App\Model\Tag')->withTimestamps();
	}


    /**
     * Get tag list id of this article
     *
     * @return mixed
     */
    public function getTagListAttribute() {
        return $this->tags->lists('id');
    }


}
