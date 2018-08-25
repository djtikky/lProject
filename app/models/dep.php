<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class dep extends Model
{
     protected $table = 'dep';	 
	 protected $primaryKey = 'depID';
	 protected $keyType = 'string';
	 public $timestamps = false;
	 public function user()
	 { return $this->hasMany('app\models\user','dep','depID');
	 }
}
?>