<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use PortalComercial\Category;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder {
	
	public function run() {
		
		DB::table('categories')->truncate();
		
		factory('PortalComercial\Category', 15)->create();
		
	}
	
}