@extends('lay-master')

@section('title','拘束案内 Top')

@section('content')
<!--　決まり文句　-->


<!--　検索に必要な条件の設定フォーム　-->
  <p class="btnicon-Search largeFont padl">ICからルート検索</p>
  <!--　出発　都道府県選択　-->
  <div>
  <form class="padl-2" action="{{route('top/')}}" method="POST">
    {{csrf_field()}}
    <p class="inline middleFont"><strong>出発地</strong></p>
      <select class="middleFont puldown-1" name="startP" id="startPref">
        @foreach(config("pref") as $index => $name)
          <option name="pref" value="{{$index}}">{{$name}}</option>
        @endforeach
      </select>
      <i class="smallpad"></i>

  <!--　出発　IC名選択　-->
  <select class="middleFont puldown-2" name="inIC" id="inIc">
    @foreach(config('ic') as $index => $i)
      @foreach($i as $name => $n)
        @if($index==1)
          <option value="{{$name}}">{{$n}}</option>
        @endif
      @endforeach
    @endforeach
  </select>
  <i class="smallpad btnicon-ArrowRight"></i>

  <!--　到着　都道府県選択　-->
    <p class="inline middleFont"><strong>到着地</strong></p>
      <select class="middleFont puldown-1" name="goalP" id="goalPref">
        @foreach(config("pref") as $index => $name)
          <option name="pref" value="{{$index}}">{{$name}}</option>
        @endforeach
      </select>
      <i class="smallpad"></i>

  <!--　到着　IC名選択　-->
  <select class="middleFont puldown-2" name="outIC" id="outIc">
    @foreach(config('ic') as $index => $i)
      @foreach($i as $name => $n)
        @if($index==1)
          <option value="{{$name}}">{{$n}}</option>
        @endif
      @endforeach
    @endforeach
  </select>
  <i class="smallpad"></i>
</div>


  <!--　車種　-->
  <div class="padt padl-2">
    <p class="inline middleFont"><strong>車種選択</strong></p>
    <select class="middleFont puldown-1" name="car" id="carModel">
      <option value="0">普通車</option><option value="1">軽自動車</option><option value="2">中型車</option>
      <option value="3">大型車</option><option value="4">特大車</option>
    </select>
    <i class="pad"></i>

  <!--　ソート順　-->
  <p class="inline middleFont"><strong>ソート順</strong></p>
  <select class="middleFont puldown-1" name="sort" id="sortBy">
    <option value="0">距離</option><option value="1">料金</option>
  </select>

  <!--　送信ボタン　onclickイベントは設定してね　-->
  <i style="padding-left:463px" ></i>
  <button type="submit" class="btnicon-MousePoint middleFont puldown-1" name="button">検索</button>
  </form>
</div>
<!--　フォーム終了　-->

<!--　どの都道府県が選択されるかにより選択できるICを変える　-->
<script type="text/javascript">
  $("#startPref").change(function(){
    var prefnum = $(this).val();
    //console.log(prefnum);   //どの都道府県が選択されているか番号で取得、確認
	$("#inIc").empty();
	    @foreach(config('ic') as $index => $i)
		var index = <?php echo json_encode($index, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
			@foreach($i as $name => $n)
				if(prefnum==index){
					$("#inIc").append($("<option>").val("{{$name}}").text("{{$n}}"));
				}
			@endforeach
		@endforeach


  });
</script>



<!--　div内に検索した番組情報を表示する　フェッチに書き換えてくれてok　-->
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
