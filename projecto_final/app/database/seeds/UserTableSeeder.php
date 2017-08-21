<?php

class UserTableSeeder extends Seeder{

	public function run(){

		DB::table('users')->delete();

		User::create(array(
			'email' => 'admin@fos.pt',
			'username' => 'admin',
			'password' => Hash::make('123456'),
			'role' => 'admin'
		));

		User::create(array(
			'email' => 'super@fos.pt',
			'username' => 'supervisor',
			'password' => Hash::make('123456'),
			'role' => 'super'
		));

		User::create(array(
			'email' => 'cliente@fos.pt',
			'username' => 'cliente',
			'password' => Hash::make('123456'),
			'role' => 'user'
		));

		User::create(array(
			'email' => 'cliente2@fos.pt',
			'username' => 'cliente2',
			'password' => Hash::make('123456'),
			'role' => 'user'
		));

		User::create(array(
			'email' => 'cliente3@fos.pt',
			'username' => 'cliente3',
			'password' => Hash::make('123456'),
			'role' => 'user'
		));

	}

}