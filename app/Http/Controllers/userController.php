<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use app\models\user;
use app\models\dep;

class userController extends BaseController
{
    public function home()
    {
		$users =  user::all();
		return view('user/home')->with('users', $users);
		//return view('user/home', ['user' => $user]);		
		//return view('user/home')->with('name','US');
    }
	public function addPage()
	{
		$dep = dep::pluck('depName','depID');
		$nullUser = new user();
		return view('user/new')->with('dep',$dep)->with('showUser',$nullUser);
	}
	public function add()
	{
		$submitbutton = Input::get('submitbutton');
		echo $submitbutton;
        if ($submitbutton=='Back')
        {	echo "Back button";	}
		elseif ($submitbutton=='Create')
		{	echo "Create button";	
		
		$addUser			= new user();
        $addUser->FName		= Input::get('FName');
		$addUser->Lname		= Input::get('Lname');
		$addUser->userName	= Input::get('userName');
        $addUser->password	= Input::get('password'); 
		$addUser->dep		= Input::get('dep');
        $addUser->save();
		/*echo $addUser->FName;
		echo $addUser->Lname;
		echo $addUser->userName;
		echo $addUser->password;
		echo $addUser->dep;*/
		
		}
		return redirect('user/home');
	}
	public function search()
	{	$key = Input::get('searchKey');		
		$users =  user::where('userName','LIKE',  "%$key%")
					->orWhere('FName', 'LIKE', "%$key%")
					->orWhere('LName', 'LIKE', "%$key%")
					->get();
		return view('user/home')->with('users', $users);
	}
	
	
	public function updatePage()
	{
		echo 'at updatePage';
		$username = Input::get('username');
		$updateUser = user::where('username','=',$username)->first();
		$dep = dep::pluck('depName','depID');

		/*echo '<br>'.$updateUser->FName.'<br>';
		echo $updateUser->Lname.'<br>';
		echo $updateUser->userName.'<br>';
		echo $updateUser->password.'<br>';
		echo $updateUser->dep.'<br>';*/

		return view('user/update')->with('showUser',$updateUser)->with('dep',$dep);

	}
	public function update()
	{
		$submitbutton = Input::get('submitbutton');
		echo $submitbutton;
        if ($submitbutton=='Back')
        {	echo "Back button";	}
		elseif ($submitbutton=='Update')
		{	echo "Update button";	
		
		$updateUser = user::find(Input::get('userName'));
		$updateUser->FName		= Input::get('FName');
		$updateUser->Lname		= Input::get('Lname');
        $updateUser->password	= Input::get('password'); 
		$updateUser->dep		= Input::get('dep');
        $updateUser->save();
		/*echo $addUser->FName;
		echo $addUser->Lname;
		echo $addUser->userName;
		echo $addUser->password;
		echo $addUser->dep;*/
		
		}
		return redirect('user/home');
		
	}
	public function deletePage()
	{	//$username = Input::get('username');
		echo 'at deletePage $username';
		
		$deleteUser = user::where('username','=',$username)->first();

		/*echo '<br>'.$deleteUser->FName.'<br>';
		echo $deleteUser->Lname.'<br>';
		echo $deleteUser->userName.'<br>';
		echo $deleteUser->password.'<br>';
		echo $deleteUser->dep.'<br>';*/

		return view('user/delete')->with('showUser',$deleteUser);

	}
	
	public function delete()
	{
		$submitbutton = Input::get('submitbutton');
		echo $submitbutton;
        if ($submitbutton=='Back')
        {	echo "Back button";	}
		elseif ($submitbutton=='Delete')
		{	echo "Delete button";	
		
		$updateUser = user::find(Input::get('userName'));
        $updateUser->delete();
		/*echo $addUser->FName;
		echo $addUser->Lname;
		echo $addUser->userName;
		echo $addUser->password;
		echo $addUser->dep;*/
		
		}
		return redirect('user/home');
		
	}
	
////////////////////////////////////////////////////////////////////
public function addWithValidate()
    {
     
        $validator = Validator::make(Input::all(),array(
                'name'                              => 'required|min:4|max:100',
                'password'                          => 'required|min:4|max:15|confirmed',
                'password_confirmation'             => 'required|min:4|max:15',
			//'email'                             => 'required|email|max:100|unique:tbl_user',
                'email'                             => 'required|email|max:100',
            ),
            array(
                'name.required'                     => 'Full Name ไม่สามารถเป็นค่าว่างได้',
                'email.required'                    => 'email ไม่สามารถเป็นค่าว่างได้',
                'email.email'                       => 'รูปแบบ E-Mail ไม่ถูกต้อง',
                'email.unique'                      => 'email นี้มีอยู่ในระบบแล้ว',       
                'password.required'                 => 'password ไม่สามารถเป็นค่าว่างได้',
                'password.confirmed'                => 'รหัสผ่านไม่ตรงกัน',
                'password_confirmation.required'    => 'confirm password ไม่สามารถเป็นค่าว่างได้',
            )
        );
         
        if ($validator->passes()) {
             
           /* $addUser                = new User();
            $addUser->name          = Input::get('name');
            $addUser->password      = Hash::make(Input::get('password'));
            $addUser->email         = Input::get('email');
            $addUser->create_at     = date("Y-m-d H:i:s",time());
            $addUser->status        = 'A';
            $addUser->save();
             */
            return Redirect::to('register'); 
             
        }else{
         
            return Redirect::to('register')->withErrors($validator)
                    ->withInput(Input::except('password'))
                    ->withInput(Input::except('password_confirmation'))
                    ->withInput(); 
                     
        }
    }


}
?>