<?php

mb_internal_encoding("UTF8");

$dsn = "mysql:dbname=registration;host=localhost;charset=utf8";

$user = "root";
$password = "";
$data = [];

$success_message = '';
$error_message = '';

$dbh = new PDO($dsn, $user, $password);
$pdo = new PDO($dsn, $user, $password);

if (isset($_POST['update_flag']) && !empty($_POST['id'])) {
    // 選択されたアカウントIDの配列を取得
    $account_id = $_POST['id'];

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$sql = "UPDATE account SET family_name = ?, last_name = ?, family_name_kana = ?,last_name_kana = ?, mail = ?, password = ?, gender = ?, postal_code = ?, prefecture = ?, address_1 = ?, address_2 = ?, authority = ?, update_flag = ? WHERE id = ?";

$stmt = $pdo->prepare($sql);
$stmt -> exec([$family_name,$last_name,$family_name_kana,$last_name_kana,$mail,$password_after,$gender,$postal_code,$prefecture,$address_1,$address_2,$authority,$registered_time]);
    
    $success_message = "更新完了しました";
} else{
    $error_message = "エラーが発生したためアカウント更新できません";
}

$update_flag = date('Y-m-d H:i:s');

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