@extends('lay-master')

@section('title','ご利用上の注意')

@section('content')
  <div class="padl">
    <h1><strong>ご利用上の注意</strong></h1>
    <div>
      <ul class="middleFont">
        <li>『ICから検索』では一部ルート検索のできない地域がございます。</li>
        <li>経路地図APIの仕様上、地図が表示できないことがございます。</li>
        <li>緯度経度判別APIの仕様上、地図表示の際に出発地と到着地が同じになる場合がございます。</li>
        <li>お借りしているAPIですので、過剰なリクエストはおやめください。</li>
        </ul>
    </div>
  </div>

@endsection
