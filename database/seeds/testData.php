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

        DB::table('projects')->insert(['name'=>'Wildlife Conservation']);
	    DB::table('projects')->insert(['name'=>'Women’s Empowerment']);
	    DB::table('projects')->insert(['name'=>'Men’s Empowerment']);
	    DB::table('projects')->insert(['name'=>'Children’s Empowerment']);
	    DB::table('projects')->insert(['name'=>'Healthcare']);
	    DB::table('projects')->insert(['name'=>'Sports and Surfing']);


            DB::table('stories')->insert(['owner'=>(int)rand(1,3), 'project'=>(int)rand(1,5), 'date'=>(int)rand(2000,2017).'/'.(int)rand(1,12).'/'.(int)rand(1,28), 'description'=>str_random('400'), 'hours'=> rand(1,24) ]);
            DB::table('stories')->insert(['owner'=>(int)rand(1,3), 'project'=>(int)rand(1,5), 'date'=>(int)rand(2000,2017).'/'.(int)rand(1,12).'/'.(int)rand(1,28), 'description'=>str_random('400'), 'hours'=> rand(1,24) ]);
            DB::table('stories')->insert(['owner'=>(int)rand(1,3), 'project'=>(int)rand(1,5), 'date'=>(int)rand(2000,2017).'/'.(int)rand(1,12).'/'.(int)rand(1,28), 'description'=>str_random('400'), 'hours'=> rand(1,24) ]);
            DB::table('stories')->insert(['owner'=>(int)rand(1,3), 'project'=>(int)rand(1,5), 'date'=>(int)rand(2000,2017).'/'.(int)rand(1,12).'/'.(int)rand(1,28), 'description'=>str_random('400'), 'hours'=> rand(1,24) ]);
            DB::table('stories')->insert(['owner'=>(int)rand(1,3), 'project'=>(int)rand(1,5), 'date'=>(int)rand(2000,2017).'/'.(int)rand(1,12).'/'.(int)rand(1,28), 'description'=>str_random('400'), 'hours'=> rand(1,24) ]);
            DB::table('stories')->insert(['owner'=>(int)rand(1,3), 'project'=>(int)rand(1,5), 'date'=>(int)rand(2000,2017).'/'.(int)rand(1,12).'/'.(int)rand(1,28), 'description'=>str_random('400'), 'hours'=> rand(1,24) ]);
            DB::table('stories')->insert(['owner'=>(int)rand(1,3), 'project'=>(int)rand(1,5), 'date'=>(int)rand(2000,2017).'/'.(int)rand(1,12).'/'.(int)rand(1,28), 'description'=>str_random('400'), 'hours'=> rand(1,24) ]);
            DB::table('stories')->insert(['owner'=>(int)rand(1,3), 'project'=>(int)rand(1,5), 'date'=>(int)rand(2000,2017).'/'.(int)rand(1,12).'/'.(int)rand(1,28), 'description'=>str_random('400'), 'hours'=> rand(1,24) ]);
            DB::table('stories')->insert(['owner'=>(int)rand(1,3), 'project'=>(int)rand(1,5), 'date'=>(int)rand(2000,2017).'/'.(int)rand(1,12).'/'.(int)rand(1,28), 'description'=>str_random('400'), 'hours'=> rand(1,24) ]);
        for($i=0;$i>80;$i++){
        }


    }
}
