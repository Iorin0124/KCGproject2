<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
	public function getNumber(Request $request){
		$select = $request->input('num',1);
		$test = [];
		for($i=1;$i<10;$i++){
			$test[] = $select*$i;
		}
		$num=[1,2,3,4,5,6,7,8,9];
		return view('test.test',compact('num','test','select'));
	}
	
    public function test(){
		return view('test.test');
	}
}
