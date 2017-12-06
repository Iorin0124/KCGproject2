<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class topController extends Controller
{
    public function search(Request $request){
		$startP = $request->input('startP',1);
		$inIC = $request->input('inIC',1);
		
		//$goalP = $request->input('goalP',1);
		//$outIC = $request->input('outIC',1);
		$sort = $request->input('sort',0);
		
		foreach(config('ic') as $index => $i){
			foreach($i as $name => $n){
				if($index==$startP && $name==$inIC){
					$inIC = $n;
					break;
				}
			}
		}
//		$url = 'http://kousoku.jp/api/route.php?f=';
//		$array = simplexml_load_string(file_get_contents($choice));
//		$item = $array->response->item;

		return view('top',compact('inIC'));
	}
}
