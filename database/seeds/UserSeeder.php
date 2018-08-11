<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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

            'name' => 'admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('123456'),
            'role' => 2,
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([

            'name' => 'Worker',
            'email' => 'worker@app.com',
            'password' => bcrypt('123456'),
            'role' => 1,
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([

            'name' => 'User',
            'email' => 'user@app.com',
            'password' => bcrypt('123456'),
            'role' => 0,
            'remember_token' => str_random(10),
        ]);

    }
}
