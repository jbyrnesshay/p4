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
            'title'=>'Woman with Umbrella',
            'category'=>'recommended',
        	'link'=>'/images/pexels-photo-57851.jpeg'
		]);
		DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Man on Mountain',
            'category'=>'recommended',
        	'link'=>'/images/pexels-photo-65035.jpeg'
		]);
		 DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Woman with Scarf',
            'category'=>'recommended',
        	'link'=>'/images/pexels-photo-87293.jpeg'
		]);
		DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Mediterranean Coast',
            'category'=>'recommended',
        	'link'=>'/images/pexels-photo-101542.jpeg'
		]);
		 DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'City Skyline',
            'category'=>'recommended',
        	'link'=>'/images/pexels-photo-160207.jpeg'
		]);
		DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Alaska',
            'category'=>'recommended',
        	'link'=>'/images/pexels-photo-164022.jpeg'
		]);
		 DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'title'=>'Fall Trail',
            'category'=>'recommended',
        	'link'=>'/images/pexels-photo-192517.jpeg'
		]);
		DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Architects View',
            'category'=>'recommended',
        	'link'=>'/images/pexels-photo-203541.jpeg'
		]);
		 DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Woods',
            'category'=>'recommended',
        	'link'=>'/images/pexels-photo-216966.jpeg'
		]);
		DB::table('pics')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Beach Beer',
            'category'=>'recommended',
        	'link'=>'/images/pexels-photo-226896.jpeg'
		]);



           DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Eridanus',
            'category'=>'astronomy',
            'link'=>'/images/astronomy/galaxy-barred-spiral-galaxy-eridanus-constellation-starry-sky-87650.jpeg'
        ]);
        DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Aquarius',
            'category'=>'astronomy',
            'link'=>'/images/astronomy/helix-nebula-ngc-7293-planetary-fog-constellation-aquarius-113744.jpeg'
        ]);
         DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Lake View',
            'category'=>'astronomy',
            'link'=>'/images/astronomy/pexels-photo.jpg'
        ]);
        DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Lone Observer',
            'category'=>'astronomy',
            'link'=>'/images/astronomy/photo-1444703686981-a3abbc4d4fe3.jpeg'
        ]);
         DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Gaseous',
            'category'=>'astronomy',
            'link'=>'/images/astronomy/solar-system-emergence-spitzer-telescope-telescope-41951.jpeg'
        ]);


        DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Street Train',
            'category'=>'city',
            'link'=>'/images/city/city-people-street-train.jpeg'
        ]);
         DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'title'=>'Downtown',
            'category'=>'city',
            'link'=>'/images/city/pexels-photo-30360.jpg'
        ]);
        DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Graffiti',
            'category'=>'city',
            'link'=>'/images/city/pexels-photo-169617.jpeg'
        ]);
         DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Cuba',
            'category'=>'city',
            'link'=>'/images/city/pexels-photo-92866.jpeg'
        ]);
        DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Dark Alley',
            'category'=>'city',
            'link'=>'/images/city/pexels-photo-104707.jpeg'
        ]);



           DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Cairn Fog',
            'category'=>'landscapes',
            'link'=>'/images/landscapes/cairn-fog-mystical-background-158607.jpeg'
        ]);
        DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Lake McDonald',
            'category'=>'landscapes',
            'link'=>'/images/landscapes/lake-mcdonald-landscape-panorama-sunset-158385.jpeg'
        ]);
         DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Desert',
            'category'=>'landscapes',
            'link'=>'/images/landscapes/pexels-photo-28051.jpg'
        ]);
        DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Coastline',
            'category'=>'landscapes',
            'link'=>'/images/landscapes/pexels-photo-30469.jpg'
        ]);
         DB::table('pics')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=>'Valley',
            'category'=>'landscapes',
            'link'=>'/images/landscapes/pexels-photo-30865.jpg'
        ]);
    }
}
