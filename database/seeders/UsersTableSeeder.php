<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('users')->insert([
    		'name' => 'Roni Baloney',
    		'email' => 'ronibaloney@example.com',
    		'password' => bcrypt('password'),
    		'admin' => false,
    	]);

      DB::table('users')->insert([
    		'name' => 'Piccolo Salvatore',
    		'email' => 'psalvatore@example.com',
    		'password' => bcrypt('password'),
    		'admin' => false,
    	]);

      DB::table('users')->insert([
    		'name' => 'Mary Patterson',
    		'email' => 'mary@example.com',
    		'password' => bcrypt('password'),
    		'admin' => false,
    	]);

      DB::table('users')->insert([
    		'name' => 'Cindy Lou Who',
    		'email' => 'clw@example.com',
    		'password' => bcrypt('password'),
    		'admin' => false,
    	]);
    }
}
