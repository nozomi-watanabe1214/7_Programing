<?php
session_start();

$error_message = '';

$dsn = "mysql:dbname=registration;host=localhost;charset=utf8";

$user = "root";
$password = "";
$data = [];

$pdo = new PDO($dsn, $user, $password);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM account WHERE mail = :mail");
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])){
        $_SESSION['user_id'] = $user['id'];//password_verify()→ハッシュ化されたパスワードと一致するか検証するコード
        header('Location:http://localhost/7_Programing/index.html');
        exit;
    } else{
    echo '<span style = "color:red;">エラーが発生したためログイン情報を取得できません。</span>';
    $messageColor = 'red';
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
            </form>
            
            <footer></footer>
        </div>
    </body>
</html>


