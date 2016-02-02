<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use PortalComercial\Product;

class ProductTableSeeder extends Seeder {
	
	public function run() {
		
		DB::table('products')->truncate();
		
		factory('PortalComercial\Product', 20)->create();
		
	}
	
}