<?php
namespace app\Http\Controllers;

use test;

use app\models\User as User;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MemberController  extends BaseController
{


	public function indexAction()
	{
		echo ' heres member_controller';
		$user = test::all();
	return view('member/index');
	}
}


?>