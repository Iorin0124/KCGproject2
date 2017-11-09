<!doctype html>
<html lang="ja">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>@yield('title')</title>

      <!-- Styles -->
        <!--  ここでレイアウト調整  -->
      <style>
        .headcol {
          background-color: #E0E0F8;
        }
        .footer {
          font-size: 12px;
          vertical-align: middle;
          margin: 20px;
        }
        .largeFont {
          font-size: 24px;
        }
        .middleFont {
          font-size: 20px;
        }
        .smallFont {
          font-size: 14px;
        }
        .padr {
          padding-right: 50px;
        }
        .pad {
          padding: 10px
        }
        .smallpad {
          padding: 6px;
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
