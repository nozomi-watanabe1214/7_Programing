<?php
session_start();

$error_message = '';

$dsn = "mysql:dbname=registration;host=localhost;charset=utf8";

$user = "root";
$password = "";
$data = [];

$dbh = new PDO($dsn, $user, $password);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    
    if($mail=='?' && $password==='?'){
        $_SESSION['account']=$mail;
        header('Location:http://localhost/7_Programing/index.html');
        exit();
    } else{
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
            <form action="" method="post">
                
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
                
                <?php 
                $token = bin2hex(random_bytes(32));
                $_SESSION['login_token'] = $token;
                echo '<input type="hidden" name="login_token" value="'.$token.'" />';
                ?>
                
            </form>
            
            <footer></footer>
        </div>
    </body>
</html>


