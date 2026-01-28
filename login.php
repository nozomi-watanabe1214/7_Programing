<?php
session_start();

$error_message = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    
    $dsn = "mysql:dbname=registration;host=localhost;charset=utf8";
    
    $user = "root";
    $password = "";
    
    try{

$pdo = new PDO($dsn, $user, $password);

 $stmt = $pdo->prepare("SELECT * FROM account WHERE mail = ?");
        $stmt->execute([$mail]);
        $row = $stmt->fetch();
    if ($row && password_verify($password, $row['password'])) {
            $_SESSION['mail'] = $row['mail'];
        
        header('Location:http://localhost/7_Programing/index.html');
            exit();
        }
    } catch(PDOException $e){
        $error_message = "エラーが発生したためログイン情報を取得できません。";
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
            <form action="index.html" method="post">
                
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
    </body>
</html>


