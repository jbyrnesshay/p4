<?php

use Illuminate\Database\Seeder;

class PicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'link'=>'/images/pexels-photo-57851.jpeg'
		]);
		DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'link'=>'/images/pexels-photo-65035.jpeg'
		]);
		 DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'link'=>'/images/pexels-photo-87293.jpeg'
		]);
		DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'link'=>'/images/pexels-photo-101542.jpeg'
		]);
		 DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'link'=>'/images/pexels-photo-160207.jpeg'
		]);
		DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'link'=>'/images/pexels-photo-164022.jpeg'
		]);
		 DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'link'=>'/images/pexels-photo-192517.jpeg'
		]);
		DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'link'=>'/images/pexels-photo-203541.jpeg'
		]);
		 DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'link'=>'/images/pexels-photo-216966.jpeg'
		]);
		DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'link'=>'/images/pexels-photo-226896.jpeg'
		]);

    }
}
