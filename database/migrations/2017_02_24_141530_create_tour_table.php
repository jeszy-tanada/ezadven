<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tour', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->string('name',255);
            $table->string('subname',255);
            $table->string('image',255);
            $table->string('image_url',255);
            $table->decimal('min_amount', 6, 2);
            $table->decimal('max_amount', 6, 2);
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('area');
            $table->boolean('is_full')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->date('date_from');
            $table->date('date_to');
            $table->text('description');
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
        Schema::drop('tour');
    }
}
