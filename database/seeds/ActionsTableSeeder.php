<?php

use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->insert(['name' => 'index']);
        DB::table('actions')->insert(['name' => 'create']);
        DB::table('actions')->insert(['name' => 'show']);
        DB::table('actions')->insert(['name' => 'update']);
        DB::table('actions')->insert(['name' => 'delete']);
    }
}
