<?php
mb_internal_encoding("utf8");

try{

    $pdo = new PDO("mysql:dbname=registratio;host=localhost;","root","");
    
    $password_after = password_hash($_POST['password'],PASSWORD_DEFAULT);
    
    if(isset($_POST['password'])){
    $password_after = password_hash($_POST['password'],
                              PASSWORD_DEFAULT);
    
    }
    
    $registered_time = date('Y-m-d H:i:s');
    
    $pdo -> exec("insert into account(family_name,last_name,family_name_kana,last_name_kana,mail,password,gender,postal_code,prefecture,address_1,address_2,authority,registered_time)
values('".$_POST['family_name']."','".$_POST['last_name']."','".$_POST['family_name_kana']."','".$_POST['last_name_kana']."','".$_POST['mail']."','".$password_after."','".$_POST['gender']."','".$_POST['postal_code']."','".$_POST['prefecture']."','".$_POST['address_1']."','".$_POST['address_2']."','".$_POST['authority']."','".$registered_time."');");

} catch(PDOException $e){
    
}
?>


<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント登録完了画面</title>
        <link rel = "stylesheet" type = "text/css" href = "style4仮.css">
    </head>
    
    <body>
        <header></header>
        
        <h1>アカウント登録完了画面</h1>
        
        <div class = "complete">
            <?php if ($success): ?>
            <h2　style = "color:black;">登録完了しました</h2>
            
            <?php else: ?>
            <h2 style = "color:red;">アカウント登録できませんでした。</h2>
            
            <?php endif; ?>
        
            <form action="regist.php">
            <input type = "submit" class = "submit" value = "TOPページへ戻る"></form> 
        </div>
        
        <footer></footer>
        
    </body>
</html>