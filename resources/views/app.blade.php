<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    body {
        font-family: "Helvetica Neue",
            Arial,
            "Hiragino Kaku Gothic ProN",
            "Hiragino Sans",
            Meiryo,
            sans-serif;
    }
    </style>
    <title>受注入力システム</title>
  </head>
  <body>
    <div class="container">
    <h1 style="font-size:1.25rem;">受注入力システム</h1>
    <div>
      <ul style="display: flex;">
        <li style="margin-right: 30px;"><a href="{{ url('/dashboard') }}">TOP</a></li>
        <li style="margin-right: 30px;"><a href="{{ url('/juchus') }}">受注入力</a></li>
        <li><a href="{{ url('/items') }}">商品マスター</a></li>
      </ul>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>