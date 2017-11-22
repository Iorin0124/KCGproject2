<!doctype html>
<html lang="ja">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <title>@yield('title')</title>

      <!-- Styles -->
        <!--  ここでレイアウト調整  -->
      <style>
        .headcol{
          background-color: #E0E0F8;
        }
        .footer{
          font-size: 12px;
          vertical-align: middle;
          margin: 20px;
        }
        .largeFont{
          font-size: 24px;
        }
        .middleFont{
          font-size: 20px;
        }
        .smallFont{
          font-size: 14px;
        }
        .padr{
          padding-right: 50px;
        }
        .padl{
          padding-left: 30px;
        }
        .padl-2{
          padding-left: 62px;
        }
        .pad{
          padding: 10px
        }
        .smallpad{
          padding: 6px;
        }
        .linedotted{
          padding: 5px;
          border-bottom: 4px dotted #E0E0F8;
        }
        strong{
          color: Navy;
        }
        .puldown-1{
          text-align: center;
          width: 120px;
          height: 40px;
          border: solid 2px Dimgray;
          border-radius: 8px/8px;
        }
        .puldown-2{
          text-align: center;
          width: 160px;
          height: 40px;
          border: solid 2px Dimgray;
          border-radius: 8px/8px;
        }
        .tablespace{
          width: 1200px;
          text-align: center;
          border: solid 2px Dimgray;
          border-radius: 4px/4px;
          cellspacing: 4px;
        }
        th{
          padding: 2px;
          width: 20%;
          border-right: solid Dimgray 2px;
          border-bottom: solid Dimgray 2px;
          background-color: PaleTurquoise;
        }
        td{
          padding: 1px;
          width: 20%;
          border-right: solid Dimgray 2px;
          background-color: AliceBlue;
        }

        .btnicon-Search:before{
          display: inline-block;
			    font-family: "FontAwesome";
			    font-size: 26px;
          margin: 2px;
          content: '\f002';
        }
        .btnicon-MousePoint:before{
          display: inline-block;
          font-family: "FontAwesome";
          font-size: 20px;
          margin: 3px;
          content: '\f245';
        }


      </style>
        <!--  ここまでがスタイル調整  -->
    </head>


    <!-- ここに中身を書いていく(HTML) -->
    <body>
      <!-- 共通のヘッダー -->
      <p class="headcol"><a href="top"><img src="../img/topIcon01.png" alt="top icon" height="80px;" width="290px;"></a></p>
      <div class="headcol pad middleFont"><center>
        <a href="top" class="padr">トップページへ</a>
        <a href="top" class="padr">ダミーリンク</a>
        <a href="my" class="padr">マイページへ</a>
        <a href="new" class="padr">新規登録</a>
        <a href="bonus" class="padr">おまけ</a>
      </center></div>
      <!--  ここまでがヘッダー  -->


      <!--  各ページ毎の中身(各々のphpファイルに記載)  -->
      <center><h1>@yield('title')</h1></center>

      @yield('content')
      <!--  ここまでが中身(各々のphpファイルに記載)  -->


      <!-- 共通のフッター -->
        <!--  プライバシーポリシー等は現状ダミーのミラーリンク  -->
      <center>
        <div class="smallFont headcol smallpad">
          <a href="top" class="padr">プライバシーポリシー</a>
          <a href="top" class="padr">サイトポリシー</a>
          <a href="top" class="padr">ご利用上の注意</a>
          <a href="top" class="padr">よくあるご質問</a>
          <a href="top" class="padr">お問い合わせ</a>
        </div>
        <div class=footer>Copyrights Io,Mcs-KCGpro02 Inc. All Rights Reserved.</div>
      </center>
      <!--  ここまでがフッター  -->

    </body>
</html>
