@extends('lay-master')

@section('title','VaAp Top')

@section('content')
<!--　決まり文句　-->


<!--　検索に必要な条件の設定フォーム　-->
    <p class="btnicon-Search largeFont padl">現在放送中のアニメを探す</p>
  <div>
    <!--　都道府県選択　-->
    <form class="padl-2">
      <select class="middleFont puldown-1" name="都道府県" id="todohuken">
        @foreach(config("todohuken") as $index => $name)
          <option value="{{$index}}">{{$name}}</option>
        @endforeach
      </select>
      <i class="padl-2" />

      <!--　放送ステータス　-->
      <select class="middleFont puldown-2" name="ステータス" id="status">
        <option value="0">都道府県を選択</option>
      </select>
      <i class="padl-2" />
      <!--　ソート条件　-->
      <select class="middleFont puldown-2" name="ソート順" id="soat">
        <option value="0">今日の放送</option><option value="1">放送曜日順</option><option value="2">五十音順</option>
      </select>
      <i class="padl-2" />
      <!--　送信ボタンonclickイベントは設定してね　-->
      <button type="button" class="btnicon-MousePoint middleFont puldown-1" name="button" onclick="">検索</button>
    </form>
  </div>
<!--　フォーム終了　-->

<!--　どの都道府県が選択されるかにより選択できるICを変える　-->
<script type="text/javascript">
  $("#todohuken").change(function(){
    var todonum = $(this).val();
    //var count = Number(1);
    //console.log(count);
    //console.log(todonum);   //どの都道府県が選択されているか番号で取得、確認
    $("#status").empty();
    // if(todonum == "1"){   //北海道
    //   @foreach(config("ic_hokkaido") as $index => $name)
    //     $("#status").append($("<option>").val("{{$index}}").text("{{$name}}"));
    //   @endforeach
    // }else if(todonum == "2"){   //青森県
    //   @foreach(config("ic_aomori") as $index => $name)
    //     $("#status").append($("<option>").val("{{$index}}").text("{{$name}}"));
    //   @endforeach
    // }
    var array =[]
    @foreach(config("prefUrl") as $index => $name)
      array.push("ic_" + "{{$name}}");
    @endforeach
    console.log(array[5]);

    for(var i=1; i<48 i++){
        if(todonum == i){   //北海道
          @foreach(config("array[i+1]") as $index => $name)
            $("#status").append($("<option>").val("{{$index}}").text("{{$name}}"));
          @endforeach
        }
    }
    // foreach(config("prefUrl") as $index => $name)
    //       if(todonum == {{$index}}){
    //            foreach(config("ic_" + "{{$name}}") as $index => $name)
    //         $("#status").append($("<option>").val("{{$index}}").text("{{$name}}"));
    //             endforeach
    //       }
    //       endforeach
   });
</script>



<!--　div内に検索した番組情報を表示する　フェッチに書き換えてくれてok　-->
  <div class="padl-2">
    <table class="tablespace middleFont">
      <thead>
      <tr>
        <th></th><th></th><th></th><th></th><th></th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      </tbody>
    </table>
  </div>
<!--　div終了　-->

  <i class="pad"></i>
@endsection
