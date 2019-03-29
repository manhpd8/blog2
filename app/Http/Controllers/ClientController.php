<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
class ClientController extends Controller
{
	function getLogin(){
		return view('client.login');
	}
	function getRegister(){
		return view('client.register');
	}
	function postRegister(Request $request){
		$arr['user_name'] = $request->user_name;
		$arr['user_pass'] = $request->user_pass;
		if(StringUtility::isNull($arr['user_name'])){
			$error['errors'] = ['null'=>'tai khoan khong duoc de trong'];
			return redirect()->back()->with($errors);
		}
		$arr['created_at'] = gmdate("Y-m-d H:i:s",time()+7*3600);
		$count = DB::select('select count(*) from blog_users where user_name ='.$arr['user_name']);
		if($count == 0 ){
			DB::table('blog_user')->insert($arr);
			$error['success'] = 'dang ky thanh cong';
			return view('client.login');
		}
		$error['errors'] = ['duplicate'=>'tai khoan da ton tai'];
		return redirect()->back()->with($errors);
	}
}