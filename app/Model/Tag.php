<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = ['name', 'parent', 'editable', 'deletable'];

	/**
	 * Get parent tag
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
	public function getParent() {
		return $this->hasOne($this, 'id', 'parent');
	}

	/**
	 * Return if it is editable
	 *
	 * @return $this|bool|\Carbon\Carbon|\DateTime|mixed|static
     */
	public function editable() {
		return $this->getAttribute('editable');
	}


	/**
	 * Return if it is deletable
	 *
	 * @return $this|bool|\Carbon\Carbon|\DateTime|mixed|static
     */
	public function deletable() {
		return $this->getAttribute('deletable');
	}

}
