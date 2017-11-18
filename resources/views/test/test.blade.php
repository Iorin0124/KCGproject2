@extends('lay-master')

@section('title','データ受け渡しテスト')

@section('content')
  <div class="panel_test"><center>
  <div class="dataTest">
  <form action="{{route('test/')}}" method="post">
  {{csrf_field()}}
  数字：<input type="text" name="num" />
  <input type="submit" value="計算" />
  </form>
@if(!empty($select))
	<table border=1>
		<tr><th>{{$select}}の段</th><th>結果</th></tr>
@foreach($num as $n)
		<tr><th>{{$n}}</th><td>{{$test[$n-1]}}</td></tr>
@endforeach
	</table>
@endif
  </div>
  </center></div>
@endsection
