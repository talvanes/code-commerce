<?php

namespace PortalComercial;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // como suprimir a exceção 'MassAssignmentException' pelo Tinker
    protected $fillable = ['name', 'description'];
	
	public function products() {
		return $this->hasMany('PortalComercial\Product');
	}
}
