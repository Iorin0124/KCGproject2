<?php
//topのController
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

//use Illuminate\Support\Facades\Config;

class topController extends Controller
{
    public function search(Request $request){
		//fromから送られてきたリクエストを変数に代入する
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

		//出発地のIC名の取得
		foreach(config('ic') as $index => $i){
			foreach($i as $name => $n){
				if($index==$startP && $name==$inIC){
					$inIC = $n;
				}
			}
		}
		
		//到着地のIC名の取得
	   foreach(config('ic') as $index => $i){
		  foreach($i as $name => $n){
				if($index==$goalP && $name==$outIC){
					$outIC  =$n;
					break;
				}
			}
		}	
		
		//天気表示の有無
		foreach(config('weatherid') as $index => $i){
			if($index==$choiceIC){
				$weather = $i;
				break;
			}
		}

		
		if($inIC == $outIC){
			//出発地と到着地が同一であった場合、XMLを取得せず通知を出す
			$alert = "出発ICと到着ICに同一のものが選択されています。";

				return view('top',compact('alert','startP','inIC','goalP','outIC','route'));		
		}else{
			//出発地と到着地が異なる場合、XMLを取得しパースする
			$xml = 'http://kosoku.jp/api/route.php?f='.$inIC.'&t='.$outIC.'&c='.$cars[$car].'&sortBy='.$choice[$sort];
			$url = simplexml_load_file($xml) or die("XMLパースエラー");
			//各パラメータの取得は分かったので、表に記すものを考える。
			$route = (string)$url->Status;

			//XMLパースが成功した場合、ルートが存在するか判定
			if($route == 'End'){
				//ルートが存在した場合、距離や所要時間、各経由地などのデータを配列に挿入する
				$count = 0;
				foreach($url->Routes->Route as $value){
					foreach($value->Details->Section->SubSections->SubSection as $sec){
						$item[$count]['From'][] = (string)$sec->From;
						$item[$count]['To'][] = (string)$sec->To;
						$item[$count]['Road'][] = (string)$sec->Road;
						$item[$count]['Length'][] = (string)$sec->Length;
						$item[$count]['Time'][] = (string)$sec->Time;
					}
					//各ルートの料金
					$item[$count]['totalToll'] = (string)$value->Summary->TotalToll;
					//各ルートの距離
					$item[$count]['dis'] = (string)$value->Summary->TotalLength;
					//各ルートの所要時間
					$item[$count]['time'] = (string)$value->Summary->TotalTime;
					$count++;
				}
				/*viewを通して別Controllerに値を送る方法とは
				グローバル変数＝＞何かは持ってこれてるけど何が持ってこれてるかわかんね、配列でないと怒られる
				セッションを利用する。
				Config(['detailData' => $item]);
				Config::set('detailData','item');*/
				//詳細ページのcontroller(DetailContoroller)でもitem内のデータを使用するため、セッションに保存しておく
				Session::put('item',$item);
				
				return view('top',compact('startP','inIC','goalP','outIC','car','sort','item','dis','weather','route','time','wShow'));
			}else{
				//ルートが存在しない場合、通知を出す
				$alert = "ルートが見つかりませんでした。";
							
				return view('top',compact('alert','startP','inIC','goalP','outIC','route'));
			}
		}
	}
}
