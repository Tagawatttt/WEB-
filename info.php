<?php
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8' , 'root', 'root');
        echo "接続成功";
      }catch(PDOException $e){
        exit('データベース接続失敗。');
        echo "接続失敗";
      }

      date_default_timezone_set("Asia/Tokyo");
      $date = date("Y-m-d");
      echo $date;

      $sql = "select * from kaigo where date = '" . $date . "' and  temperature >= 37.0";
      $data = $pdo->query($sql);

      $result = $data->fetchAll(PDO::FETCH_ASSOC);
      // $pdo = NULL;
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
      <table border="1">
        <tr>
          <th>名前</th>
          <th>性別</th>
          <th>食事</th>
          <th>排泄</th>
          <th>入浴</th>
          <th>行事</th>
          <th>睡眠</th>
          <th>ご意見</th>
        </tr>
        <h1>３７度以上の患者さんのリスト</h1>
        <?php foreach($result as $row): ?>
        <tr>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['sex'] ?></td>
          <td><?php echo $row['temperature'] ?></td>
          <td><?php echo $row['food'] ?></td>
          <td><?php echo $row['toilet'] ?></td>
          <td><?php echo $row['bathroom'] ?></td>
          <td><?php echo $row['event'] ?></td>
          <td><?php echo $row['opinion'] ?></td>
        </tr>
        <?php endforeach ?>
      </table>
    </div>
  
</body>
</html>

