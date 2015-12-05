<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_infos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'nickname',
        'phone',
        'image',
        'brief',
        'detail',
        'domain',
        'tab',
        'gender',
        'birthday',
        'blood_type'
    ];


    /**
     * Return user of info.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\Model\User');
    }

    public function getFillable() {
        return $this->fillable;
    }

}
