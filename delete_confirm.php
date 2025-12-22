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

$sql = "SELECT family_name, last_name, family_name_kana, last_name_kana, mail, password, gender, postal_code, prefecture, address_1, address_2, authority, delete_flag, registered_time, update_time FROM account where id = {$_POST['id']}";

$stmt = $pdo->query($sql);

$row = $stmt->fetch(PDO::FETCH_ASSOC);//　$rowに$_POST['id']のユーザー列をfetch(PDO::FETCH_ASSOC)にて取得

?>


<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント削除確認画面</title>
        <link rel = "stylesheet" type = "text/css" href = "style7.css">
    </head>
    
    <body>
        <header></header>
        
        <h1>アカウント削除確認画面</h1>
        <form method = "post">
            
        <div class = "confirm">
            <h2>本当に削除してもよろしいですか？</h2>
        </div>
        
        
        <input type = "submit" class = "button1" value = "前に戻る" formaction="javascript:history.back()">
    
        <input type = "submit" class = "button2" value = "削除する" formaction="delete_complete.php" method="post">
            <input type = "hidden" value = "<?php 
                                        echo $_POST['id']; ?>" name = "id">
            <input type = "hidden" value = "<?php 
                                        echo $row['family_name']; ?>" name = "family_name">
            <input type = "hidden" value = "<?php 
                                        echo $row['last_name']; ?>" name = "last_name">
            <input type = "hidden" value = "<?php 
                                        echo $row['family_name_kana']; ?>" name = "family_name_kana">
            <input type = "hidden" value = "<?php 
                                        echo $row['last_name_kana']; ?>" name = "last_name_kana">
            <input type = "hidden" value = "<?php 
                                        echo $row['mail']; ?>" name = "mail">
            <input type = "hidden" value = "<?php 
                                        echo $row['password']; ?>" name = "password">
            <input type = "hidden" value = "<?php 
                                        echo $row['gender']; ?>" name = "gender">
            <input type = "hidden" value = "<?php 
                                        echo $row['postal_code']; ?>" name = "postal_code">
            <input type = "hidden" value = "<?php 
                                        echo $row['prefecture']; ?>" name = "prefecture">
            <input type = "hidden" value = "<?php 
                                        echo $row['address_1']; ?>" name = "address_1">
            <input type = "hidden" value = "<?php 
                                        echo $row['address_2']; ?>" name = "address_2">
            <input type = "hidden" value = "<?php 
                                        echo $row['authority']; ?>" name = "authority">
            <input type="hidden" value="1" name="delete_flag">
        
        </form>
        
        <footer></footer>
        
    </body>
</html>
