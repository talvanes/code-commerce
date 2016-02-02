<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use PortalComercial\User;

class UserTableSeeder extends Seeder {
	
	public function run() {
		
		DB::table('users')->truncate();
		
		factory('PortalComercial\User', 10)->create();
		
	}
	
}