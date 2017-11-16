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
    <form class="padl-2">
      <select class="middleFont puldown-1" name="都道府県">
        <option value="0">北海道</option><option value="1">青森</option><option value="2">岩手県</option>
        <option value="3">宮城県</option><option value="4">秋田県</option><option value="5">山形県</option>
        <option value="6">福島県</option><option value="7">茨城県</option><option value="8">栃木県</option>
        <option value="9">群馬県</option><option value="10">埼玉県</option><option value="11">千葉県</option>
        <option value="12">東京都</option><option value="13">神奈川県</option><option value="14">新潟県</option>
        <option value="15">富山県</option><option value="16">石川県</option><option value="17">福井県</option>
        <option value="18">山梨県</option><option value="19">長野県</option><option value="20">岐阜県</option>
        <option value="21">静岡県</option><option value="22">愛知県</option><option value="23">三重県</option>
        <option value="24">滋賀県</option><option value="25">京都府</option><option value="26">大阪府</option>
        <option value="27">兵庫県</option><option value="28">奈良県</option><option value="29">和歌山県</option>
        <option value="30">鳥取県</option><option value="31">島根県</option><option value="32">岡山県</option>
        <option value="33">広島県</option><option value="34">山口県</option><option value="35">徳島県</option>
        <option value="36">香川県</option><option value="37">愛媛県</option><option value="38">高知県</option>
        <option value="39">福岡県</option><option value="40">佐賀県</option><option value="41">長野県</option>
        <option value="42">熊本県</option><option value="43">大分県</option><option value="44">宮崎県</option>
        <option value="45">鹿児島県</option><option value="46">沖縄県</option>
      </select>
      <i class="padl-2" />
      <!--　放送ステータス　-->
      <select class="middleFont puldown-1" name="ステータス">
        <option value="0">放送中</option><option value="1">新規</option>
      </select>
      <i class="padl-2" />
      <!--　ソート条件　-->
      <select class="middleFont puldown-2" name="ソート順">
        <option value="0">今日の放送</option><option value="1">放送曜日順</option><option value="2">五十音順</option>
      </select>
      <i class="padl-2" />
      <!--　送信ボタンonclickイベントは設定してね　-->
      <button type="button" class="btnicon-MousePoint middleFont puldown-1" name="button" onclick="">検索</button>
    </form>
  </div>
<!--　フォーム終了　-->

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
