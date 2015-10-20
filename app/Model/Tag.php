<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	public function getParent() {
		return $this->hasOne($this, 'id', 'parent');
	}

}
