<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pics', function (Blueprint $table) {
            #increments method will make a Primary autoincrementing field
            #most tables start this way
            $table->increments('id');

            #this generates two columns: 'created_at' and 'updated_at
            # to keep track of changes ot a row
            $table->timestamps();

            #the rest of the fields...
            $table->string('title')->nullable();
           
            $table->string('category')->nullable();
            
            $table->string('link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pics');
    }
}
