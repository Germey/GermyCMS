<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = ['name', 'parent'];

	public function getParent() {
		return $this->hasOne($this, 'id', 'parent');
	}

}
