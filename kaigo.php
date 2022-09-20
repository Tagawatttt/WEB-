<?php
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8' , 'root', 'root');
    echo "接続成功";
  }catch(PDOException $e){
    exit('データベース接続失敗。');
    echo "接続失敗";
  }

  if(isset($_POST['submit'])){
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['sex'] = $_POST['sex'];
    $_SESSION['temperature'] = $_POST['temperature'];
    $_SESSION['food'] = $_POST['food'];
    $_SESSION['toilet'] = $_POST['toilet'];
    $_SESSION['bathroom'] = $_POST['bathroom'];
    $_SESSION['event'] = $_POST['event'];
    $_SESSION['sleep'] = $_POST['sleep'];
    $_SESSION['opinion'] = $_POST['opinion'];

    $name = $_SESSION['name'];//ユーザーから受け取った値を変数に入れる
    $sex = $_SESSION['sex'];
    $temperature = $_SESSION['temperature'];
    $food = $_SESSION['food'];
    $toilet = $_SESSION['toilet'];
    $bathroom = $_SESSION['bathroom'];
    $event = $_SESSION['event'];
    $sleep = $_SESSION['sleep'];
    $opinion = $_SESSION['opinion'];
    $date = date('Y-m-d');

    $sql = "INSERT INTO kaigo (name,sex,temperature,food,toilet,bathroom,event,sleep,opinion,date) VALUES ('$name','$sex','$temperature','$food','$toilet','$bathroom','$event','$sleep','$opinion','$date')";
    $pdo->query($sql);
    $pdo = NULL;
  }


?>

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
  <div class=""><a href="info.php">患者リスト</a></div>
      <form action="kaigo.php" method="post">
          <p>お名前：<input type="text" name="name"></p>
          <p>性別：
            <input type="radio" name="sex" value="男性"> 男性
            <input type="radio" name="sex" value="女性"> 女性
          </p>
          <p>体温: <input type="text" name="temperature"></p>
          <p>食事: 
            <input type="radio" name="food" value="できた" required>できた
            <input type="radio" name="food" value="できなかった" required>できなかった
          </p>
          <p>排泄:
            <select name="toilet">
                <option value="0回">０回</option>
                <option value="2回">１回</option>
                <option value="2回">２回</option>
                <option value="3回">３回</option>
                <option value="４回以上">４回以上</option>
            </select>
          </p>
          <p>入浴: 
            <input type="radio" name="bathroom" value="できた" required>できた
            <input type="radio" name="bathroom" value="できなかった" required>できなかった
          </p>
          <p>行事: <input type="text" name="event"> </p>

          <p>睡眠: 
            <select name="sleep">
              <option value="すごく良い">"すごく良い"</option>
              <option value="良い">"良い"</option>
              <option value="普通">"普通"</option>
              <option value="悪い">"悪い"</option>
              <option value="すごく悪い">"すごく悪い"</option>
            </select>
          </p>
          <p>ご意見:</p>
          <p><textarea cols="35" rows="5" name="opinion"></textarea></p>
          <p><input type="submit" value="送信" name="submit"></p>
      </form>
      </div>
    </div>
  
</body>
</html>