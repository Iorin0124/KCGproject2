<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class topController extends Controller
{
    public function search(Request $request){
		$cars = ['普通車','軽自動車','中型車','大型車','特大車'];
		$choice = ['距離','料金'];
		
		$startP = $request->input('startP',1);
		$inIC = $request->input('inIC',1);

		$goalP = $request->input('goalP',1);
		$outIC = $request->input('outIC',1);
		$car = $request->input('car',0);
		$sort = $request->input('sort',0);

		//IC名の取得
		foreach(config('ic') as $index => $i){
			foreach($i as $name => $n){
				if($index==$startP && $name==$inIC){
					$inIC = $n;
				}
			}
		}
		
	   foreach(config('ic') as $index => $i){
		  foreach($i as $name => $n){
				if($index==$goalP && $name==$outIC){
					$outIC  =$n;
					break;
				}
			}
		}	

		$xml = 'http://kosoku.jp/api/route.php?f='.$inIC.'&t='.$outIC.'&c='.$cars[$car].'&sortBy='.$choice[$sort];
		$url = simplexml_load_file($xml);
		$item = [];
		//多重階層のところエラー出てる
		foreach($url->children() as $name => $value){
			$item[$name] = $value;
			echo $item[$name];
		}
//		$item = json_decode( json_decode($obj), true);

		return view('top',compact('startP','inIC','goalP','outIC','car','sort','item'));
	}
}
