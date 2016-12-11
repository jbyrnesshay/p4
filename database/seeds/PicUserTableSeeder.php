<?php

use Illuminate\Database\Seeder;
//use Picnook\Pic;
use Picnook\Pic;
use Picnook\User;

class PicUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists = [
        'Jamal'=>[4, 7, 9],
        'Jill'=>[1, 3, 8, 2, 4],
        'Joachim'=>[5],
        ];
    
    foreach ($lists as $user => $items) {

    	$user = User::where('first_name', 'like', $user)->first();

    	foreach ($items as $item) {
    		$addtoList = Pic::where('id', 'like', $item)->first();

    	$user->pics()->save($addtoList);	
    	}
    }
  }
}
