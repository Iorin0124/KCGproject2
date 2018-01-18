@extends('lay-master')

@section('title','ルート詳細')

@section('content')
  <p class="largeFont padl">ルート詳細</p>

  <div class="padl-2" style="overflow:hidden">
    <div class="headcol img-div" style="float:left;">
      <img src="../img/" alt="経路地図" style="width:700px; height=600px;">
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
