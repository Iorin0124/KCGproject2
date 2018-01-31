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
  	@if(!empty($urlStr))
		<!-- 地図リクエストURLが生成されたとき -->
		<!-- $urlStrが&routeの中身、$pinStrが&pinの中身-->
		{{$urlStr}}<br>{{$pinStr}}<br>
		<div class="headcol img-div" style="float:left;" id="map">
		<img src="../img/" alt="経路地図" style="width:700px; height=600px;">
		</div>
	@else
		<!-- 一つでも地点の緯度経度が見つからなかった場合。文章がページの端っこにいくんで調整できたらお願いします。 -->
		<h3>申し訳ございませんマップを表示することができませんでした。</h3>
	@endif
    <div  style="float:right;">
      <table class="tablespace-2">
        <tr><th >移動経路</th><th>使用道路</th><th>距離と時間</th></tr>
		@for($i=0 ; $i<(count($item[$choice]['From'])) ; $i++)
				<tr><td>{{$item[$choice]['From'][$i]}}<br />↓</td><td>{{$item[$choice]['Road'][$i]}}</td><td>{{$item[$choice]['Length'][$i]}}km{{$item[$choice]['Time'][$i]}}分</td></tr>
		@endfor
				<tr><td>{{$item[$choice]['To'][count($item[$choice]['To'])-1]}}</td><td></td><td></td></tr>
      </table>
    </div>
  </div>
  <i class="pad"></i>

@endsection
