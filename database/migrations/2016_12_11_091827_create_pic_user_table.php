<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pic_user', function (Blueprint $table){
        $table->increments('id');
        $table->timestamps();

        $table->integer('pic_id')->unsigned();
        $table->integer('user_id')->unsigned();
         $table->string("mat_color")->nullable();
            $table->float('mat_thickness')->nullable();
            $table->string('frame_color')->nullable();
            $table->float('frame_thickness')->nullable();
            $table->float('cost')->unsigned()->nullable();
        
        $table->foreign('pic_id')->references('id')->on('pics');
        $table->foreign('user_id')->references('id')->on('users');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pic_user');
    }
}
