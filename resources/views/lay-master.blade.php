<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts //lessファイルの指定箇所// -->
        <!-- link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"
        -->

        <!-- Styles -->
          <!--  ↓参考は同階層「welcome.blade.php」-->
        <style>
        .header {
          background-color: #E0E0F8;
        }
        .titleName {
            font-size: 50px;
            margin-bottom: 0px;
            vertical-align: bottom;
          }
        .footer {
          font-size: 12px;
          vertical-align: middle;
          margin: 20px;
        }
        .middleFont {
          font-size: 20px;
          padding-right: 50px;
        }
        .mar {
          padding: 10px
        }
        </style>
    </head>

    <!-- ここに中身を書いていく(HTML) -->
    <body>
      <!-- 共通のヘッダーを書く -->
      <p class=header><a href="top"><img src="../img/topIcon01.png" alt="top icon" height="80px;" width="290px;"></a></p>
      <div class="header mar"><center>
        <a href="top" class="middleFont">トップページへ</a>
        <a href="aaa" class="middleFont">ダミーリンク</a>
        <a href="bbb" class="middleFont">ダミーリンク</a>
        <a href="my" class="middleFont">マイページへ</a>
        <a href="new" class="middleFont">新規登録</a>
      </center></div>

      <h1>@yield('title')</h1>

      @yield('content')

      <!-- 共通のフッターを書く -->
      <center><div class=footer>Copyrights Io,Mcs-KCGpro02 Inc. All Rights Reserved.</div></center>
    </body>
</html>
