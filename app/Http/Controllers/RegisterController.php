<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class RegisterController extends BaseController
{
 
    public function registerForm()
    {
        return view('register/form');
    }
     
    public function registerCreate()
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