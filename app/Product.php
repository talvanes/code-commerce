<?php

namespace PortalComercial;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
<<<<<<< HEAD
    protected $fillable = ['category_id', 'user_id', 'name', 'description', 'price', 'featured', 'recommend'];
=======
    protected $fillable = ['category_id', 'name', 'description', 'price', 'featured', 'recommend'];
>>>>>>> 12d284a521f8d542aeb4d91f70ebd93758e05806
	
	public function category() {
		return $this->belongsTo('PortalComercial\Category');
	}
<<<<<<< HEAD

	public function user() {
		return $this->belongsTo('PortalComercial\User');
	}
=======
>>>>>>> 12d284a521f8d542aeb4d91f70ebd93758e05806
}
