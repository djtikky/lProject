<?php
namespace App\models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Illuminate\Database\Eloquent;

//use Illuminate\Database\Eloquent\Model; // ������¡��ҹ Eloquent � laravel



class test extends Eloquent {

    protected $table = 'users';
   // public static function getMyData(){
        //$user = Test::find();
    }


}
?>