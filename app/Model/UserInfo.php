<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'phone', 'image', 'brief', 'detail', 'domain', 'popularity'];

    /**
     * Return user of info.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\Model\User');
    }

}
