<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('inquiries', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->string('name',100);
            $table->string('email',100);
            $table->string('contact',100);
            $table->boolean('is_done')->default(false);
            $table->boolean('is_ok')->default(false);
            $table->text('question');
            $table->integer('tour_id')->unsigned();
            $table->foreign('tour_id')->references('id')->on('tour');
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
        Schema::drop('inquiries');
    }
}
