<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('profiles')->insert(['name' => 'admin']);

        Schema::create('module_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->integer('module_id')->unsigned();
            $table->timestamps();

            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('module_id')->references('id')->on('modules');

            $table->unique(['profile_id', 'module_id']);
        });

        DB::table('module_profile')->insert(['profile_id' => '1', 'module_id' => '1']);
        DB::table('module_profile')->insert(['profile_id' => '1', 'module_id' => '2']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('module_profile');
        Schema::drop('profiles');
    }
}
