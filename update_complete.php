<?php
mb_internal_encoding("utf8");

$success_message = '';
$error_message = '';

$id = $_POST['id']; 
$family_name = $_POST['family_name'];
$last_name = $_POST['last_name'];
$family_name_kana = $_POST['family_name_kana'];
$last_name_kana = $_POST['last_name_kana'];
$mail = $_POST['mail'];  
$password = $_POST['password'];
$gender = $_POST['gender'];
$postal_code = $_POST['postal_code'];
$prefecture = $_POST['prefecture'];
$address_1 = $_POST['address_1'];
$address_2 = $_POST['address_2'];
$authority = $_POST['authority'];

try{

$pdo = new PDO("mysql:dbname=registration;host=localhost;","root","");
    
$password_after = password_hash($_POST['password'],PASSWORD_DEFAULT);
    
    if(isset($_POST['password'])){
    $password_after = password_hash($_POST['password'],
                              PASSWORD_DEFAULT);
    }

$update_time = date('Y-m-d H:i:s');
   
//$pdo -> exec("UPDATE account set(family_name,last_name,family_name_kana,last_name_kana,mail,password,gender,postal_code,prefecture,address_1,address_2,authority,update_time)
//values('".$_POST['family_name']."','".$_POST['last_name']."','".$_POST['family_name_kana']."','".$_POST['last_name_kana']."','".$_POST['mail']."','".$password_after."','".$_POST['gender']."','".$_POST['postal_code']."','".$_POST['prefecture']."','".$_POST['address_1']."','".$_POST['address_2']."','".$_POST['authority']."','".$update_time."');");
    
$update = $pdo->prepare("UPDATE account SET family_name=:family_name, last_name=:last_name, family_name_kana=:family_name_kana, last_name_kana=:last_name_kana, mail=:mail, password=:password, gender=:gender, postal_code=:postal_code, prefecture=:prefecture, address_1=:address_1, address_2=:address_2, authority=:authority, update_time FROM account where id = {$_POST['id']}");

$update->bindValue(':family_name', $family_name);
$update->bindValue(':last_name', $last_name);
$update->bindValue(':family_name_kana', $family_name_kana);
$update->bindValue(':last_name_kana', $last_name_kana);
$update->bindValue(':mail', $mail);
$update->bindValue(':password', $password);
$update->bindValue(':gender', $gender);
$update->bindValue(':postal_code', $postal_code);
$update->bindValue(':prefecture', $prefecture);
$update->bindValue(':address_1', $address_1);
$update->bindValue(':address_2', $address_2);
$update->bindValue(':authority', $authority);
       
$update-> execute();
    
    $success_message = "更新完了しました";
} catch(PDOException $e){
    $error_message = "エラーが発生したためアカウント登録できませんでした";
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント更新完了画面</title>
        <link rel = "stylesheet" type = "text/css" href = "style11.css">
    </head>
    
    <body>
        <header></header>
        
        <h1>アカウント更新完了画面</h1>
        
        <div class = "complete">
            <?php if ($success_message): ?>
            <h2 style = "color:black">
            <?php echo ($success_message); ?></h2>
            
            <?php endif; ?>
            
            <?php if ($error_message): ?>
            <h2 style = "color:red;"><?php echo ($error_message); ?></h2>
            
            <?php endif; ?>
        
        <form action="index.html">
            <input type = "submit" class = "submit" value = "TOPページへ戻る"></form>
        </div>

        <footer></footer>
        
    </body>
</html>