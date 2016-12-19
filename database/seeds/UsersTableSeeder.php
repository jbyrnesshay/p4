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
        // in addition to name field, I have first_name and last_name fields
        ['jill@harvard.edu','jill','helloworld', 'jill', ''], # <-- Required for P4
        ['jamal@harvard.edu','jamal','helloworld', 'jamal', ''], # <-- Required for P4
        ['jmb464@g.harvard.edu','joachim','helloworld', 'joachim', 'byrnes-shay']  
    ];
    	
        $existingUsers = User::all()->keyBy('email');

        foreach($users as $user) {

        	if(!array_key_exists($user[0], $existingUsers)){
        		$user = User::create([
        			'email'=>$user[0],
        			'name'=>$user[1], # <== to satisfy P4 requirement
                    'password'=>Hash::make($user[2]),
        			'first_name'=>$user[3], #<-- my own preference
                    'last_name'=>$user[4] #<--preference
        			]);
        	}
        }
    }
}
