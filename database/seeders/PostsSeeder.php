<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('posts')->insert([
        'title' => 'Test 1',
        'post' => 'This is where all of the good stuff is going to go!',
        'slug' => 'test-1'
      ]);

      DB::table('posts')->insert([
        'title' => 'Test 2',
        'post' => 'This is where all of the good stuff is going to go!',
        'slug' => 'test-2'
      ]);

      DB::table('posts')->insert([
        'title' => 'Test 3',
        'post' => 'This is where all of the good stuff is going to go!',
        'slug' => 'test-3'
      ]);
    }
}
