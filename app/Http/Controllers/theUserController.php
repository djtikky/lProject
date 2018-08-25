<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use app\models\theUser;

class theUserController extends BaseController
{
    public function home()
    {
		echo ' at user+home _controller';
		$theUser =  theUser::all();
		


		//return view('user/home')->with('name','US');
		//return view('user/home', ['theUser' => $theUser]);
		return view('theUser/home')->with('theUser', $theUser);
    }
	public function add()
	{
		echo ' at user+home _controller';

		  $addUser                = new theUser();
            $addUser->FName          = Input::get('FName');
			$addUser->Lname          = Input::get('Lname');
			$addUser->userName          = Input::get('userName');
            $addUser->password      = Input::get('password');           
            $addUser->save();
             
			return redirect('theUser/home');
	}
}
?>