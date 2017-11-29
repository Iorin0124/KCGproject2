@extends('lay-master')

@section('title','VaAp Top')

@section('content')
<!--　決まり文句　-->
  <div><center>
    <p class="largeFont">『<strong>V</strong>oice <strong>a</strong>cter <strong>A</strong>nime <strong>p</strong>roject』通称<strong>VaAp</strong>へようこそ</p>
    <p class="largeFont linedotted"><strong>VaAp</strong>はあなたの快適なアニメライフを応援します</p>
  </center></div>

<!--　検索に必要な条件の設定フォーム　-->
    <p class="btnicon-Search largeFont padl">現在放送中のアニメを探す</p>
  <div>
    <!--　都道府県選択　-->
    <form class="padl-2" action="{{route('top/')}}" method="POST">
   {{csrf_field()}}
	<select class="middleFont puldown-1" name="pref">
		@foreach(config('pref') as $index => $name)
			<option value="{{$index}}">{{$name}}</option>
		@endforeach
	</select>
      <i class="padl-2" />
      <!--　放送ステータス　-->
      <select class="middleFont puldown-1" name="stateSele">
        <option value="0">放送中</option><option value="1">新規</option>
      </select>
      <i class="padl-2" />
      <!--　ソート条件　-->
      <select class="middleFont puldown-2" name="sort">
        <option value="0">今日の放送</option><option value="1">放送曜日順</option><option value="2">五十音順</option>
      </select>
      <i class="padl-2" />
      <!--　送信ボタンonclickイベントは設定してね　-->
      <input type="submit" class="btnicon-MousePoint middleFont puldown-1" name="button" value="検索" />
    </form>
  </div>
<!--　フォーム終了　-->

<!--　div内に検索した番組情報を表示する　フェッチに書き換えてくれてok　-->
@if(!empty($item))
  <div class="padl-2">
    <table class="tablespace middleFont">
      <thead>
      <tr>
        <th>曜日</th><th>状態</th><th>番組</th><th>放送時間</th><th>放送局</th>
      </tr>
      </thead>
		<tbody>
		@foreach($item as $value)
		  <tr>
			<td>{{$value->week}}</td><td>{{$value->state}}</td><td>{{$value-title}}</td><td>{{$value->time}}</td><td>{{$value->station}}</td>
		  </tr>
		@endforeach
		</tbody>
    </table>
  </div>
<!--　div終了　-->
@endif

  <i class="pad"></i>
@endsection
