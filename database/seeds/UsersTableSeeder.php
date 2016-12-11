<?php

use Illuminate\Database\Seeder;
use Picnook\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        ['jill@harvard.edu','jill','','helloworld'], # <-- Required for P4
        ['jamal@harvard.edu','jamal','','helloworld'], # <-- Required for P4
        ['jmb464@g.harvard.edu','joachim', 'byrnes-shay','helloworld']  
    ];
    	
    $existingUsers = User::all()->keyBy('email');

    foreach($users as $user) {

    	if(!array_key_exists($user[0], $existingUsers)){
    		$user = User::create([
    			'email'=>$user[0],
    			'first_name'=>$user[1],
    			'last_name'=>$user[2],
    			'password'=>Hash::make($user[3]),
    			]);
    	}
    }
    }
}
