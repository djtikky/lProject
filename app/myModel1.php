<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class myModel1 extends Model
{
    //
	 protected $table = 'user';
	    public static function getMyData(){
			echo ' at myModel model';
		}
}
