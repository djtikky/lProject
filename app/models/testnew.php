<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model;

class testnew extends Model {
    protected $table = 'user';
    public static function getMyData(){
		echo ' at testnew model <br>';
        //$user = Test::find();
    }
}
?>