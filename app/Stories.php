<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stories extends Model
{
	protected $table ='stories';
    protected $fillable = ['owner','project', 'date', 'description', 'hours'];
    //
}
