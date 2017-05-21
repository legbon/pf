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
        //
    	DB::table('users')->insert([
          'name' => env('INITIAL_ADMIN_NAME', 'dummy'),
          'email' => env('INITIAL_ADMIN_EMAIL', 'dummy@dummymail.com'),
          'password' => bcrypt(env('INITIAL_ADMIN_PASSWORD', 'dummy')),
      ]);
    }
}
