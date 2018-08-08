<?php

use Illuminate\Database\Seeder;

class Smar extends Seeder
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
            'id' => 1,
            'name' => 'mohamed',
            'email' => 'smar@app.com',
            'password' => bcrypt('123456789'),
            'remember_token' => str_random(10),
        ]);
    }
}
