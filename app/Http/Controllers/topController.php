<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class topController extends Controller
{
    public function search(Request $request){
		$cars = ['普通車','軽自動車等','中型車','大型車','特大車'];
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
		
		if($inIC == $outIC){
			$alert = "出発ICと到着ICに同一のものが選択されています。";

			return view('top',compact('alert'));		
		}else{
			$xml = 'http://kosoku.jp/api/route.php?f='.$inIC.'&t='.$outIC.'&c='.$cars[$car].'&sortBy='.$choice[$sort];
			$url = simplexml_load_file($xml) or die("XMLパースエラー");
			//各パラメータの取得は分かったので、表に記すものを考える。
			$rote = (string)$url->Status;

			if($rote == 'End'){
				//距離
				$dis = (string)$url->Routes->Route->Summary->TotalLength;
				//各料金の取得
				foreach($url->Routes->Route->Details->Section->Tolls->Toll as $value){
					$item[] = (string)$value;
				}

				return view('top',compact('startP','inIC','goalP','outIC','car','sort','item','dis'));
			}else{
				$alert = "ルートが見つかりませんでした。";
							
				return view('top',compact('alert'));
			}
		}
	}
}
