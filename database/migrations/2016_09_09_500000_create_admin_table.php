<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('profile_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('profile_id')->references('id')->on('profiles');
        });

        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@dpfcolombia.com',
            'password' => bcrypt('1234567890'),
            'profile_id' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('administrators');
    }
}
