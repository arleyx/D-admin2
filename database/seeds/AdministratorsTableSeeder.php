<?php

use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrators')->insert([
            'name' => 'Administrator',
            'email' => 'admin@dpfcolombia.com',
            'password' => bcrypt('1234567890'),
            'role_id' => 1
        ]);
    }
}
