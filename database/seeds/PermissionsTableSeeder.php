<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users actions
        DB::table('permissions')->insert(['action_id' => 1, 'module_id' => 1]);
        DB::table('permissions')->insert(['action_id' => 2, 'module_id' => 1]);
        DB::table('permissions')->insert(['action_id' => 3, 'module_id' => 1]);
        DB::table('permissions')->insert(['action_id' => 4, 'module_id' => 1]);
        DB::table('permissions')->insert(['action_id' => 5, 'module_id' => 1]);

        // Roles actions
        DB::table('permissions')->insert(['action_id' => 1, 'module_id' => 2]);
        DB::table('permissions')->insert(['action_id' => 2, 'module_id' => 2]);
        DB::table('permissions')->insert(['action_id' => 3, 'module_id' => 2]);
        DB::table('permissions')->insert(['action_id' => 4, 'module_id' => 2]);
        DB::table('permissions')->insert(['action_id' => 5, 'module_id' => 2]);
    }
}
