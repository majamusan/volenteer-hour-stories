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
	    DB::table('projects')->insert(['name'=>'Wildlife Conservation','description'=> 'Wildlife Conservation']);
	    DB::table('projects')->insert(['name'=>'Women’s empowerment','description'=> 'Women’s empowerment']);
	    DB::table('projects')->insert(['name'=>'Men’s empowerment','description'=> 'Men’s empowerment']);
	    DB::table('projects')->insert(['name'=>'Children’s empowerment','description'=> 'Children’s empowerment']);
	    DB::table('projects')->insert(['name'=>'Healthcare','description'=> 'Healthcare']);
	    DB::table('projects')->insert(['name'=>'Sports and surfing','description'=> 'Sports and surfing']);
    }
}
