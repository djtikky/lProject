<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class theUser extends Model
{
     protected $table = 'user';
	 protected $primaryKey = 'userName';
	 protected $keyType = 'string';
	 public $timestamps = false;

public function depFK() {

    return $this->belongsTo('app\models\user','depID','dep');
}
}
?>
