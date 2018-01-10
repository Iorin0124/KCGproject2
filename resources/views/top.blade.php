@extends('lay-master')

@section('title','高速案内 Top')

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
          <option name="pref" value="{{$index}}" <?php if(!empty($startP)&&$startP==$index){print 'selected';}; ?>>{{$name}}</option>
        @endforeach
      </select>
      <i class="smallpad"></i>

  <!--　出発　IC名選択　-->
  <select class="middleFont puldown-2" name="inIC" id="inIc">
    @foreach(config('ic') as $index => $i)
      @foreach($i as $name => $n)
		@if(empty($inIC))
          <option value="{{$name}}">{{$n}}</option>
        @elseif(!empty($inIC)&&$index==$startP)
          <option value="{{$name}}" <?php if($inIC==$n){print 'selected';}; ?>>{{$n}}</option>
        @endif
      @endforeach
    @endforeach
  </select>
  <i class="smallpad btnicon-ArrowRight"></i>
  <i class="btnicon-ArrowRight"></i>
  <i class="smallpad btnicon-ArrowRight"></i>


  <!--　到着　都道府県選択　-->
    <p class="inline middleFont"><strong>到着地</strong></p>
      <select class="middleFont puldown-1" name="goalP" id="goalPref">
        @foreach(config("pref") as $index => $name)
          <option name="pref" value="{{$index}}" <?php if(!empty($goalP)&&$goalP==$index){print 'selected';}; ?>>{{$name}}</option>
        @endforeach
      </select>
      <i class="smallpad"></i>

  <!--　到着　IC名選択　-->
  <select class="middleFont puldown-2" name="outIC" id="outIc">
    @foreach(config('ic') as $index => $i)
      @foreach($i as $name => $n)
		@if(empty($outIC))
          <option value="{{$name}}">{{$n}}</option>
        @elseif(!empty($outIC)&&$index==$goalP)
          <option value="{{$name}}" <?php if($outIC==$n){print 'selected';}; ?>>{{$n}}</option>
        @endif
      @endforeach
    @endforeach
  </select>
  <i class="smallpad" style="padding-left:12px"></i>

<!--　出発地と目的地の入れ替えボタン　onclickイベントは設定してね　-->
<button type="button" onclick="change();" class="btnicon-Refresh inline middleFont puldown-1" name="Rbutton">入替</button>
</div>

  <!--　車種　-->
  <div class="padt padl-2">
    <p class="inline middleFont"><strong>車種選択</strong></p>
    <select class="middleFont puldown-1" name="car" id="carModel">
      <option value="0" <?php if(!empty($car)&&$car==0){print 'selected';}; ?>>普通車</option>
	  <option value="1" <?php if(!empty($car)&&$car==1){print 'selected';}; ?>>軽自動車等</option>
	  <option value="2" <?php if(!empty($car)&&$car==2){print 'selected';}; ?>>中型車</option>
      <option value="3" <?php if(!empty($car)&&$car==3){print 'selected';}; ?>>大型車</option>
	  <option value="4" <?php if(!empty($car)&&$car==4){print 'selected';}; ?>>特大車</option>
    </select>
    <i class="pad"></i>

  <!--　ソート順　-->
  <p class="inline middleFont"><strong>ソート順</strong></p>
  <select class="middleFont puldown-1" name="sort" id="sortBy">
    <option value="0" <?php if(!empty($sort)&&$sort==0){print 'selected';}; ?>>距離</option>
    <option value="1" <?php if(!empty($sort)&&$sort==1){print 'selected';}; ?>>時間</option>
	  <option value="2" <?php if(!empty($sort)&&$sort==2){print 'selected';}; ?>>料金</option>
  </select>
  <i class="pad"></i>

  <!--　天気表示　切り替え　-->  <!--変数は後で設定して-->
  <p class="inline middleFont"><strong>天気表示</strong></p>
  <select class="middleFont puldown-1" name="sort" id="/*変数*/">
    <option value="0" <?php if(!empty($aaa/*$変数*/)&&$aaa/*$変数*/==0){print 'selected';}; ?>>無し</option>
    <option value="1" <?php if(!empty($aaa/*$変数*/)&&$aaa/*$変数*/==1){print 'selected';}; ?>>出発地</option>
    <option value="2" <?php if(!empty($aaa/*$変数*/)&&$aaa/*$変数*/==2){print 'selected';}; ?>>到着地</option>
  </select>

  <!--　天気表示　選択地域　-->    <!--変数は後で設定して-->
  <i class="smallpad"></i>
  <select class="middleFont puldown-1" name="sort" id="/*変数*/">
    <option value="0">-----</option>
      <!--ここに選択された都道府県の天気選択肢を設定-->
  </select>

  <!--　送信ボタン　onclickイベントは設定してね　-->
  <i style="padding-left:317px" ></i>
  <button type="submit" class="btnicon-MousePoint middleFont puldown-1" name="button">検索</button>
  </form>
</div>
<!--　フォーム終了　-->

<!--　天気のプラグイン　-->
<div class="padl-2 padt-2">
  <div id="mamewaza_weather" style="" class="mamewaza_weather divspace"></div>
</div>
<!--　天気のプラグイン終了　-->

<!-- 同一ICが選択されていた場合、alertを出す -->
@if(!empty($alert))
	<script>
		var str = <?php echo json_encode($alert, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
		alert(str);
	</script>
@endif

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
  $("#goalPref").change(function(){
    var prefnum = $(this).val();
    //console.log(prefnum);   //どの都道府県が選択されているか番号で取得、確認
  $("#outIc").empty();
    @foreach(config('ic') as $index => $i)
    var index = <?php echo json_encode($index, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
      @foreach($i as $name => $n)
        if(prefnum==index){
          $("#outIc").append($("<option>").val("{{$name}}").text("{{$n}}"));
        }
      @endforeach
    @endforeach
  });

  function change(){
	var inPref = $("#startPref").val();
	var outPref = $("#goalPref").val();
	var inIC = $("#inIc").val();
	var outIC = $("#outIc").val();

	$("#inIc").empty();
	$("#outIc").empty();

	$("#startPref").empty();
	@foreach(config('pref') as $index => $name)
		var index = <?php echo json_encode($index, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
		if(outPref != index){
			$("#startPref").append($("<option>").val("{{$index}}").text("{{$name}}"));
		}else{
			$("#startPref").append($("<option selected>").val("{{$index}}").text("{{$name}}"));

		}
    @endforeach

	$("#goalPref").empty();
	@foreach(config('pref') as $index => $name)
		var index = <?php echo json_encode($index, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
		if(inPref != index){
			$("#goalPref").append($("<option>").val("{{$index}}").text("{{$name}}"));
		}else{
			$("#goalPref").append($("<option selected>").val("{{$index}}").text("{{$name}}"));

		}
    @endforeach


	  @foreach(config('ic') as $index => $i)
		var index = <?php echo json_encode($index, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
			@foreach($i as $name => $n)
				if(outPref==index){
					if(outIC == <?php echo json_encode($name, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>){
						$("#inIc").append($("<option selected>").val("{{$name}}").text("{{$n}}"));
					}else{
						$("#inIc").append($("<option>").val("{{$name}}").text("{{$n}}"));
					}
				}
			@endforeach
		@endforeach

	  @foreach(config('ic') as $index => $i)
		var index = <?php echo json_encode($index, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
			@foreach($i as $name => $n)
				if(inPref==index){
					if(inIC == <?php echo json_encode($name, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>){
						$("#outIc").append($("<option selected>").val("{{$name}}").text("{{$n}}"));
					}else{
						$("#outIc").append($("<option>").val("{{$name}}").text("{{$n}}"));
					}
				}
			@endforeach
		@endforeach
  }
</script>


<!--　天気を表示させるプラグインを導入　-->
@if(!empty($weather))
	<script type="text/javascript">
		var weather = <?php echo json_encode($weather, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
	  $.mamewaza_weather( {
		selector: "#mamewaza_weather",
		  region: weather,
		  layout:"horizontalMini",
		  when:"7days",
		  explanation:"1"
	  } );
	 </script>
@endif
	 
<!--　div内に検索した情報を表示する　フェッチに書き換えてくれてok　-->
@if(!empty($inIC))
  <div class="padt-2 padl-2">
    <table class="tablespace middleFont">
      <thead>
      <tr>
        <th>料金</th><th>距離</th><th>時間</th><th>パラメータ</th><th>書いてね</th>
      </tr>
      </thead>
		<tbody>
		@for($i=0 ; $i<count($item) ; $i++)
		  <tr>
			<td>{{$item[$i]}}</td><td>{{$dis}}</td><td>{{$inIC}}</td><td>{{$outIC}}</td><td>{{$inIC}}</td>
		</tr>
		@endfor
		</tbody>
    </table>
  </div>
  @endif
<!--　div終了　-->

  <i class="pad"></i>
@endsection
