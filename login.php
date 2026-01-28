<?php
mb_internal_encoding("utf8");

$error_message = '';

if(isset($_POST['login'])){
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    
    try{
        $pdo = new PDO("mysql:dbname=registration;host=localhost;","root","");
        
        $sql = 'SELECT COUNT(*) from account where mail=? and password=?';
        
        $stmt = $pdo -> prepare($sql);
        
        $stmt -> execute(array($mail, $password));
        
        $result = $stmt -> fetch();
        
        $stmt = null;
        $pdo = null;
        
        if($result[0] !=0){
            header('Location:http://localhost/7_Programing/index.html');
            exit();
        } else{
            $error_message = "エラーが発生したためログイン情報を取得できません。";
        }
    } catch(PDOException $e){
        echo $e -> getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ログイン画面</title>
        <link rel = "stylesheet" type = "text/css" href = "style12.css">
    </head>
    
    <body>
        <header></header>
          <h1>ログイン画面</h1>
        
        <div class="login">
            <form action="" method="POST">
                
                <div>
                <label>メールアドレス</label>
                <input type = "text" class = "text"
                   size = "35" name = "mail" maxlength = "100" pattern = "^[0-9a-zA-Z\-\@\.]*$" required>
                </div>
                
                <div>
                <label>パスワード</label>
                <input type = "password" class = "text"
                   size = "35" name = "password" maxlength = "10" pattern = "^[a-zA-Z0-9]*$" required>
                </div>
                
                <div>
                    <input type = "submit" class = "submit" value = "ログイン">
                </div>
                
            </form>
            
            <footer></footer>
        </div>