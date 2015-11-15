<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = ['name', 'parent', 'editable', 'deletable'];

	/**
	 * Get parent tag
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function getParent() {
		return $this->belongsTo($this, 'parent', 'id');
	}


	/**
	 * Get children tag
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function getChildren() {
		return $this->hasMany($this, 'parent', 'id');
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
		if ($this->getChildren()->get()->toArray()) {
			return false;
		}
		return $this->getAttribute('deletable');
	}

}
