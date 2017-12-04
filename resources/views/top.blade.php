@extends('lay-master')

@section('title','VaAp Top')

@section('content')
<!--　決まり文句　-->


<!--　検索に必要な条件の設定フォーム　-->
<!-- 出発都道府県のnameをstartP、出発ICのnameをinIC、ソートのnameをsortに変更 -->
<!-- 目的地の都道府県のnameをgoalP、到着ICのnameをoutIC、車種のnameをcarでHTMLを書いてください(Controllerからそれらの名前で参照)) -->
    <p class="btnicon-Search largeFont padl">出発IC、到着ICを設定する</p>
  <div>
    <!--　都道府県選択　-->
   <form class="padl-2" action="{{route('top/')}}" method="POST">
	  {{csrf_field()}}
      <select class="middleFont puldown-1" name="startP" id="todohuken">
        @foreach(config("todohuken") as $index => $name)
          <option name="todo" value="{{$index}}">{{$name}}</option>
        @endforeach
      </select>
      <i class="padl-2" />

      <!--　放送ステータス　-->
      <select class="middleFont puldown-2" name="inIC" id="status">
        @foreach(config('ic') as $index => $i)
			@foreach($i as $name => $n)
			@if($index==1)
				<option value="{{$name}}">{{$n}}</option>
			@endif
			@endforeach
		@endforeach
      </select>
      <i class="padl-2" />
      <!--　ソート条件　-->
      <select class="middleFont puldown-2" name="ソート順" id="sort">
        <option value="0">今日の放送</option><option value="1">放送曜日順</option><option value="2">五十音順</option>
      </select>
      <i class="padl-2" />
      <!--　送信ボタンonclickイベントは設定してね　-->
      <button type="submit" class="btnicon-MousePoint middleFont puldown-1" name="button">検索</button>
    </form>
  </div>
<!--　フォーム終了　-->

<!--　どの都道府県が選択されるかにより選択できるICを変える　-->
<script type="text/javascript">
  $("#todohuken").change(function(){
    var todonum = $(this).val();
	$("#status").empty();
	    @foreach(config('ic') as $index => $i)
		var index = <?php echo json_encode($index, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
			@foreach($i as $name => $n)
				if(todonum==index){
					$("#status").append($("<option>").val("{{$name}}").text("{{$n}}"));
				}
			@endforeach
		@endforeach
  });
</script>



<!--　内容はとりあえず必要そうなものを入れておいただけなのであとから変更可　-->
@if(!empty($inIC))
  <div class="padl-2">
    <table class="tablespace middleFont">
      <thead>
      <tr>
        <th>料金</th><th>距離</th><th>時間</th><th>パラメータ</th><th>書いてね</th>
      </tr>
      </thead>
		<tbody>
		  <tr>
			<td>{{$inIC}}</td><td>{{$inIC}}</td><td>{{$inIC}}</td><td>{{$inIC}}</td><td>{{$inIC}}</td>
		  </tr>
		</tbody>
    </table>
  </div>
<!--　div終了　-->
@endif

  <i class="pad"></i>
@endsection
