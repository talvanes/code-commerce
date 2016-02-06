<?php

namespace PortalComercial;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'user_id', 'name', 'description', 'price', 'featured', 'recommend'];
	
	public function category() {
		return $this->belongsTo('PortalComercial\Category');
	}

	public function user() {
		return $this->belongsTo('PortalComercial\User');
	}

	public function images() {
		return $this->hasMany('PortalComercial\ProductImage');
	}

	public function tags() {
		return $this->belongsToMany('PortalComercial\Tag');
	}

	/**
	 * Access this method as either name_description or nameDescription attribute
	 *
	 * @return string
	 */
	public function getNameDescriptionAttribute() {
		return "{$this->name} - {$this->description}";
	}

	/**
	 * Access this method as either tag_list or tagList attribute
	 *
	 * @return string
	 */
	public function getTagListAttribute() {
		$tags = $this->tags->lists('name')->all();

		return implode(', ', $tags);
	}

	/**
	 *
	 *
	 * @param $query
	 * @return mixed
	 */
	public function scopeFeatured($query) {
		return $query->where('featured','=',1);
	}

	/**
	 *
	 *
	 * @param $query
	 * @return mixed
	 */
	public function scopeRecommended($query) {
		return $query->where('recommend','=',1);
	}
}
