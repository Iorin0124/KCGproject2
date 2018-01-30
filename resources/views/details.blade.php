@extends('lay-master')

@section('title','ルート詳細')

@section('content')
  <p class="largeFont padl">ルート詳細</p>

  <div class="padl-2" style="overflow:hidden">
    <div class="headcol img-div" style="float:left;">
      <img src="" alt="経路地図" style="width:700px; height=600px;">
      <!-- dj00aiZpPU8wNHp2UFFsNkkzWiZzPWNvbnN1bWVyc2VjcmV0Jng9YWM- -->
      <!-- サンプルURL https://map.yahooapis.jp/course/V1/routeMap?appid=dj00aiZpPU8wNHp2UFFsNkkzWiZzPWNvbnN1bWVyc2VjcmV0Jng9YWM-&route=35.6659127870595,139.7308921534391,35.6631583463388,139.731235476193&pin=35.6659127870595,139.7308921534391&pin=35.6631583463388,139.731235476193|width:7|color:ff4500&width=700&height=600&style=grayish -->
      <!-- サイズ以外のコマンドが効いていないので要確認 -->
    </div>
    <div  style="float:right;">
      <table class="tablespace-2">
        <tr><th >移動経路</th><th>使用道路</th><th>距離と時間</th></tr>
        <tr><td>b<br />↓</td><td>b</td><td>b</td></tr>
        <tr><td>b<br />↓</td><td>b</td><td>b</td></tr>
      </table>
    </div>
  </div>
  <i class="pad"></i>

@endsection
