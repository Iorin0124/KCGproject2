<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class topController extends Controller
{
    public function search(Request $request){
		$startP = $request->input('startP',1);
		$inIC = $request->input('inIC',1);

		$goalP = $request->input('goalP',1);
		$outIC = $request->input('outIC',1);
		$car = $request->input('car','普通車');
		$sort = $request->input('sort',0);

		//IC名の取得
		foreach(config('ic') as $index => $i){
			foreach($i as $name => $n){
				if($index==$startP && $name==$inIC){
					$inIC = $n;
				}else if($index==$goalP && $name==$outIC){
					$outIC = $n;
				}
			}
		}
		$url = 'http://kousoku.jp/api/route.php?f='.$inIC.'&t='.$goalIC.'&c='.$car.'&sortBy='.$sort;
//		$array = simplexml_load_string(file_get_contents($choice));
//		$item = $array->response->item;

		return view('top',compact('inIC'));
	}
}
