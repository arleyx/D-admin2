<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('modules')->insert(['name' => 'users']);
        DB::table('modules')->insert(['name' => 'profiles']);

        Schema::create('action_module', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('module_id')->unsigned();
            $table->integer('action_id')->unsigned();
            $table->timestamps();

            $table->foreign('module_id')->references('id')->on('modules');
            $table->foreign('action_id')->references('id')->on('actions');

            $table->unique(['module_id', 'action_id']);
        });

        DB::table('action_module')->insert(['module_id' => '1', 'action_id' => '1']);
        DB::table('action_module')->insert(['module_id' => '1', 'action_id' => '2']);
        DB::table('action_module')->insert(['module_id' => '1', 'action_id' => '3']);
        DB::table('action_module')->insert(['module_id' => '1', 'action_id' => '4']);
        DB::table('action_module')->insert(['module_id' => '2', 'action_id' => '1']);
        DB::table('action_module')->insert(['module_id' => '2', 'action_id' => '2']);
        DB::table('action_module')->insert(['module_id' => '2', 'action_id' => '3']);
        DB::table('action_module')->insert(['module_id' => '2', 'action_id' => '4']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('action_module');
        Schema::drop('modules');
    }
}
