<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return View::make('welcome');
		//return View::make('member/index'); 
});

Route::get('/member', function () {
    //return View::make('welcome');
	return View::make('member/index'); 
});

Route::any('user','userController@home');
Route::any('user/home','userController@home');
Route::any('user/search','userController@search');
Route::any('user/addPage','userController@addPage');
Route::any('user/add','userController@add');
Route::any('user/updatePage/{username?}','userController@updatePage');
Route::any('user/update','userController@update');
Route::any('user/deletePage/{username?}','userController@deletePage');
Route::any('user/delete','userController@delete');
//Route::any('user/updatePage/{username}','userController@updatePage');
//Route::any('user/deletePage/{username?}',function ($username='unknown user') {return $username;  });

Route::any('user/deletePage/{username?}',function ($username='unknown user') {
//return App::make('userController')->deletePage($username);	
return redirect()->action('userController@deletePage', [$username]);  
 });





Route::any('theuser/home','theUserController@home');
Route::any('theuser/add','theUserController@add');





Route::get('register', 'RegisterController@registerForm');
Route::any('register/create', 'RegisterController@registerCreate');
Route::get('test1', function () {
    return 'test1';
});
Route::any('test2', function () { /* both get and post*/
    return 'any test2';
});
Route::get('test1/ttt', function () { /* both get and post*/
    return 'test1/ttt';
});
Route::get('theuser/{name?}', function ($name="guest") { 	
    return 'user name = '.$name;
})->where('name','[A-Za-z]+');




Route::get('test','testController@home');


Route::any('member', [
'as' => 'member/index',
'uses' => 'MemberController@indexAction'
]);








