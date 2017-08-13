<?php

use Illuminate\Database\Seeder;

class testData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    DB::table('users')->insert(['name'=>'John Doe','email'=>'gvivolunteer1@simplimantis.com','password'=>bcrypt('gvi1000') ]);
        DB::table('users')->insert(['name'=>'Jane Doe','email'=>'gvivolunteer2@simplimantis.com','password'=>bcrypt('gvi2000') ]);
        DB::table('users')->insert(['name'=>'Bob Doe','email'=>'gvivolunteer3@simplimantis.com','password'=>bcrypt('gvi3000') ]);
        DB::table('users')->insert(['name'=>'Tom Doe','email'=>'gvivolunteer4@simplimantis.com','password'=>bcrypt('gvi4000') ]);
        DB::table('users')->insert(['name'=>'Lisa Doe','email'=>'gvivolunteer5@simplimantis.com','password'=>bcrypt('gvi5000') ]);
        DB::table('users')->insert(['name'=>'Jane Doe','email'=>'gvivolunteer6@simplimantis.com','password'=>bcrypt('gvi6000') ]);
        DB::table('users')->insert(['name'=>'Frank Doe','email'=>'gvivolunteer7@simplimantis.com','password'=>bcrypt('gvi6000') ]);
        DB::table('users')->insert(['name'=>'Temba Doe','email'=>'gvivolunteer8@simplimantis.com','password'=>bcrypt('gvi6000') ]);
        DB::table('users')->insert(['name'=>'Euan Doe','email'=>'gvivolunteer9@simplimantis.com','password'=>bcrypt('gvi6000') ]);
        DB::table('users')->insert(['name'=>'Isabella Doe','email'=>'gvivolunteer10@simplimantis.com','password'=>bcrypt('gvi6000') ]);

        DB::table('projects')->insert(['name'=>'Wildlife Conservation']);
	    DB::table('projects')->insert(['name'=>'Women’s Empowerment']);
	    DB::table('projects')->insert(['name'=>'Men’s Empowerment']);
	    DB::table('projects')->insert(['name'=>'Children’s Empowerment']);
	    DB::table('projects')->insert(['name'=>'Healthcare']);
	    DB::table('projects')->insert(['name'=>'Sports and Surfing']);


        for($i=0;$i<90;$i++){
            DB::table('stories')->insert(['owner'=>(int)rand(1,10), 'project'=>(int)rand(1,5), 'date'=>'2017/'.(int)rand(1,7).'/'.(int)rand(1,28), 'description'=>str_random('1500'), 'hours'=> rand(1,15) ]);
        }

        for($i=0;$i<180;$i++){
            DB::table('stories')->insert(['owner'=>(int)rand(1,10), 'project'=>(int)rand(1,5), 'date'=>(int)rand(2015,2016).'/'.(int)rand(1,12).'/'.(int)rand(1,28), 'description'=>str_random('1500'), 'hours'=> rand(1,17) ]);
        }

    }
}
