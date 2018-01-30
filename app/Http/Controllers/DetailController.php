<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
//use Illuminate\Support\Facades\Config;

class DetailController extends Controller
{
	public function result(Request $request){
		//topから値の取得
		//$item = Config::get('detailData');
		if(Session::has('item')){
			$item = Session::get('item');
		}else{
			$item("aaa");
		}
		
		$highway = ["東名高速道路","中央高速道路","名神高速道路","東名神高速道路","東名神高速道路","伊勢湾岸自動車道","常盤自動車道","磐越自動車道","東北自動車道","秋田自動車道","関越自動車道","中国自動車道","山陽自動車道","山陽自動車道","山陽自動車","山陽自動車道","山陽自動車道","米子自動車道","九州自動車道","大分自動車道","大分自動車道","長崎自動車道","宮崎自動車道","北陸自動車道","上信越自動車道","東海北陸自動車道","東海北陸自動車道","道央自動車道","札幌自動車道","道東自動車道","道東自動車道","道東自動車","松山自動車道","松山自動車道","高松自動車道","高松自動車道","徳島自動車道","高知自動車道"];
		
		//東名高速道路のみ、$urlを配列にする？
		$url[] = "https://www.ajaxtower.jp/googlemaps/data/data/highway-toumei.json";
		$url[] = "https://www.ajaxtower.jp/googlemaps/data/data/highway-chuou.json";
		$url[] = "https://www.ajaxtower.jp/googlemaps/data/data/highway-meishin.json";

		for($i=0 ; $i<count($url) ; $i++){
			$json = file_get_contents($url[$i]);
			$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
			$arr = json_decode($json,true);
			for($j=0 ; $j<count($arr['marker']) ; $j++){
				$result[$highway[$i]][$j][] = $arr['marker'][$j]['type'];
				$result[$highway[$i]][$j][] = $arr['marker'][$j]['pname'];
				$result[$highway[$i]][$j][] = $arr['marker'][$j]['lat'];
				$result[$highway[$i]][$j][] = $arr['marker'][$j]['lng'];
			}
		};
		
		return view('details',compact('result','item'));
	}
}
