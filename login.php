<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>例題</title>
</head>
<body>

<?php

  try {
    //DB名、ユーザー名、パスワード
    $dsn = 'mysql:dbname=データベース名;host=サーバー名';
    $user = 'ユーザー名';
    $password = 'パスワード';

    $PDO = new PDO($dsn, $user, $password); //MySQLのデータベースに接続
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    //input_post.phpの値を取得
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];


    $sql = "INSERT INTO contents (name, category, description) VALUES (:name, :category, :description)"; // INSERT文を変数に格納。:nameや:categoryはプレースホルダという、値を入れるための単なる空箱
    $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params = array(':name' => $name, ':category' => $category, ':description' => $description); // 挿入する値を配列に格納する
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行

    echo "<p>name: ".$name."</p>";
    echo "<p>category: ".$category."</p>";
    echo "<p>description: ".$description."</p>";
    echo '<p>で登録しました。</p>'; // 登録完了のメッセージ
  } catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
  }

?>

    
</body>
</html>