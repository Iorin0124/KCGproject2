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

        </style>
    </head>

    <!-- ここに中身を書いていく(HTML) -->
    <body>
      <!-- 共通のヘッダーを書く -->

      @yield('content')

      <!-- 共通のフッターを書く -->
    </body>
</html>
