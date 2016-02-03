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
}
