<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>介護記載</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>

  <h1 class="title" style="font-size: 50px">介護記載WEBアプリ</h1>
  <div class=date>
  <?php
    date_default_timezone_set("Asia/Tokyo");
    echo(date('Y-m-d'))
  ?>
  </div>
  </header>

  <div class="top-wrap">

    <div class="top-list">     
    <form action="" method="post">
        <h2>Eメール</h2>
        <input type="text">
        <h3>パスワード</h3>
        <input type="password">
       
        <button><a href="kaigo.php" style="text-decoration:none;">ログイン</a></button>

    </form>
    </div>
  
</body>
</html>

