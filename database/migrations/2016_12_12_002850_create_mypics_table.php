<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMypicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mypics', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamps();
       
            $table->string('link');
            $table->string("title");
            $table->string("mat_color")->nullable();
            $table->string('mat_thickness')->nullable();
            $table->string('frame_color')->nullable();
            $table->string('frame_thickness')->nullable();
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mypics');
    }
}
