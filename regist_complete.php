<?php
mb_internal_encoding("utf8");

$pdo = new PDO("mysql:dbname=registration;host=localhost;","root","");

$pdo -> exec("insert into account(family_name,last_name,family_name_kana,last_name_kana,mail,password,gender,postal_code,prefecture,address_1,address_2,authority)
values('".$_POST['family_name']."','".$_POST['last_name']."','".$_POST['family_name_kana']."','".$_POST['last_name_kana']."','".$_POST['mail']."','".$_POST['password']."','".$_POST['gender']."','".$_POST['postal_code']."','".$_POST['prefecture']."','".$_POST['address_1']."','".$_POST['address_2']."','".$_POST['authority']."');");
?>


<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント登録完了画面</title>
        <link rel = "stylesheet" type = "text/css" href = "style4.css">
    </head>
    
    <body>
        <header></header>
        
        <h1>アカウント登録完了画面</h1>
        
        <div class = "complete">
            <h2>登録完了しました</h2>
        
            <form action="regist.php">
            <input type = "submit" class = "submit" value = "TOPページへ戻る"></form> 
        </div>
        
        <footer></footer>
        
    </body>
</html>