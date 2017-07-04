<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->string('first_name',32);
            $table->string('last_name',32);
            $table->string('email',255);
            $table->string('password',255);
            $table->string('image',255);
            $table->string('image_url',255);
            $table->string('contact',32);
            $table->string('country',32);
            $table->boolean('is_active')->default(true);
            $table->enum('role', ['admin', 'user', 'customer'])->default('customer');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('user');
    }
}
