<?php

mb_internal_encoding("UTF8");

$dsn = "mysql:dbname=registration;host=localhost;charset=utf8";

$user = "root";
$password = "";
$data = [];

$dbh = new PDO($dsn, $user, $password);

try{
    $pdo = new PDO($dsn, $user, $password);
} catch(PDOException $e){
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$account_id_delete = $_POST['id'];

$sql = "SELECT family_name, last_name, family_name_kana, last_name_kana, mail, password, gender, postal_code, prefecture, address_1, address_2, authority FROM account where id = {$_POST['id']}";

$stmt = $pdo->prepare("DELETE FROM account WHERE id = ?");

$row = $stmt->execute([$account_id_delete]);

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
            
        <div class = "complete">
            <h2>削除完了しました。</h2>
        </div>
              
        <div>
            <input type = "submit" class = "submit" value = "TOPページへ戻る" formaction="list.php">
        </div>
        </form>
        
        <footer></footer>
        
    </body>
</html>
