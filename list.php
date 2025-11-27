<?php

mb_internal_encoding("UTF8");

$dsn = "mysql:dbname=registration;host=localhost;charset=utf8";

$user = "root";
$password = "";

$data = [];

$dbh = new PDO($dsn, $user, $password);

$sql = 'SELECT id, family_name, last_name, family_name_kana, last_name_kana, mail, gender, authority, delete_flag, registered_time, update_time FROM account';

$stmt = $dbh -> prepare($sql); 

$stmt -> execute();

$data = $stmt -> fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント一覧画面</title>
        <link rel = "stylesheet" type = "text/css" href = "style5.css">
    </head>
    
    <body>
        <header></header>
        
    <h1>アカウント一覧画面</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前（性）</th>
                    <th>名前（名）</th>
                    <th>カナ（性）</th>
                    <th>カナ（名）</th>
                    <th>メールアドレス</th>
                    <th>性別</th>
                    <th>アカウント権限</th>
                    <th>削除フラグ</th>
                    <th>登録日時</th>
                    <th>更新日時</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $row):
                ?>

                <tr>
                <td><?php echo ($row['id'])?></td>
                <td><?php echo ($row['family_name'])?></td>
                </tr>
                
                <?php endforeach; ?>
            </tbody>
        </table>
           
<footer></footer>