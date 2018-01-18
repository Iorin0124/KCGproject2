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

		$choiceIC = $request->input('choiceIC',0);
		$wShow = $request->input('wShow',0);
		
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
		
		foreach(config('weatherid') as $index => $i){
			if($index==$choiceIC){
				$weather = $i;
				break;
			}
		}

		
		if($inIC == $outIC){
			$alert = "出発ICと到着ICに同一のものが選択されています。";

				return view('top',compact('alert','startP','inIC','goalP','outIC','route'));		
		}else{
			$xml = 'http://kosoku.jp/api/route.php?f='.$inIC.'&t='.$outIC.'&c='.$cars[$car].'&sortBy='.$choice[$sort];
			$url = simplexml_load_file($xml) or die("XMLパースエラー");
			//各パラメータの取得は分かったので、表に記すものを考える。
			$route = (string)$url->Status;

			if($route == 'End'){
/*				//距離
				dis = (string)$url->Routes->Route->Summary->TotalLength;
				//各料金の取得
				foreach($url->Routes->Route->Details->Section->Tolls as $value){
					foreach($value->Toll as $_value){
						$item[] = (string)$_value;
					}
				}
*/
				$count = 0;
				foreach($url->Routes->Route as $value){
					foreach($value->Details->Section->Tolls->Toll as $toll){
						//各ルートの料金
						$item[$count][] = (string)$toll;
					}
					//各ルートの距離
					$dis[$count] = (string)$value->Summary->TotalLength;
					//各ルートの所要時間
					$time[$count] = 0;
					$time[$count] = (string)$value->Summary->TotalTime;
					$count++;
				}
				
				return view('top',compact('startP','inIC','goalP','outIC','car','sort','item','dis','weather','route','time','wShow'));
			}else{
				$alert = "ルートが見つかりませんでした。";
							
				return view('top',compact('alert','startP','inIC','goalP','outIC','route'));
			}
		}
	}
}
