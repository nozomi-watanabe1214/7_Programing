<?php

mb_internal_encoding("UTF8");

$dsn = "mysql:dbname=registration;host=localhost;charset=utf8";

$user = "root";
$password = "";
$data = [];

$dbh = new PDO($dsn, $user, $password);

 $pdo = new PDO($dsn, $user, $password);

if (isset($_POST['delete_flag']) && !empty($_POST['id'])) {
    // 選択されたアカウントIDの配列を取得
    $account_id = $_POST['id'];
    
    $sql = "UPDATE account SET delete_flag = '1' WHERE id = ($account_id)";

    $stmt = $pdo->query($sql);
    
} else {
    $stmt->error;
}

$delete_flag = date('Y-m-d H:i:s');

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント削除完了画面</title>
        <link rel = "stylesheet" type = "text/css" href = "style8.css">
    </head>
    
    <body>
        <header></header>
        
        <h1>アカウント削除完了画面</h1>
        <form method = "post">
            
        <div>
            <h2>削除完了しました。</h2>
        </div>
              
        <div>
            <input type = "submit" class = "submit" value = "TOPページへ戻る" formaction="list.php">
        </div>
        </form>
        
        <footer></footer>
        
    </body>
</html>
