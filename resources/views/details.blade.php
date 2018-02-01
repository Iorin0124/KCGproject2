@extends('lay-master')

@section('title','ルート詳細')

@section('content')
  <p class="largeFont padl">ルート詳細</p>

<!--	@if(!empty($result))
	@foreach($result as $key => $val)
		@for($i=0 ; $i<count($val) ; $i++)
			{{$val[$i][1]}}
		@endfor
		<br>
	@endforeach
	@endif
-->

  <div class="padl-2" style="overflow:hidden">
	<!-- 地図が表記できるか否か判別する -->
  	@if(!empty($urlStr))
		<div class="headcol img-div" style="float:left;" id="map">
		<img src="https://map.yahooapis.jp/course/V1/routeMap?appid=dj00aiZpPU8wNHp2UFFsNkkzWiZzPWNvbnN1bWVyc2VjcmV0Jng9YWM-&route={{$urlStr}}|width:7|color:ff4500{{$pinStr}}&height=600&width=700&style=grayish">
		</div>
	@else
    <div class="headcol img-div" style="float:left;" id="map">
    <p class="padl middleFont">申し訳ございません。<br />マップを表示することができませんでした。</p>
    </div>
	@endif
	<!-- 経路の詳細を記した表の作成 -->
    <div  style="float:right;">
      <table class="tablespace-2 middleFont">
        <tr><th>移動経路</th><th>使用道路</th><th>距離と時間</th></tr>
		@for($i=0 ; $i<(count($item[$choice]['From'])) ; $i++)
				<tr><td class="tableborder-0">{{$item[$choice]['From'][$i]}}<br />↓</td><td class="tableborder-2"><br />{{$item[$choice]['Road'][$i]}}</td><td class="tableborder-2"><br />{{$item[$choice]['Length'][$i]}}km {{$item[$choice]['Time'][$i]}}分</td></tr>
		@endfor
				<tr><td  class="tableborder-0">{{$item[$choice]['To'][count($item[$choice]['To'])-1]}}</td><td ></td><td class="tableborder-2"></td></tr>
      </table>
    </div>
  </div>
  <i class="pad"></i>

@endsection
