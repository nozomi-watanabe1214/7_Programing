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

//$data = new PDO('SELECT * FROM account ORDER BY id DESC');

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
                    <td><?php echo ($row['id']) ?></td>
                    <td><?php echo ($row['family_name'])?></td>
                    <td><?php echo ($row['last_name'])?></td>
                    <td><?php echo ($row['family_name_kana'])?></td>
                    <td><?php echo ($row['last_name_kana'])?></td>
                    <td><?php echo ($row['mail'])?></td>
                    <td><?php if($row['gender'] == 0){
                            echo "男";
                            } else if($row['gender'] == 1){
                                echo "女";
                            } ?>
                    </td>
                    <td><?php if($row['authority'] == 0){
                            echo "一般";
                            } else if($row['authority'] == 1){
                                echo "管理者";
                            } ?>
                    </td>
                    <td><?php if($row['delete_flag'] == 0){
                            echo "有効";
                            } else if($row['delete_flag'] == 1){
                                echo "無効";
                            } ?>
                    </td>
                    <td><?php 
                        if
                        ($date = new DateTime($row['registered_time'])){
                        echo $date -> format('Y-m-d');
                        }
                        else if ($row['null']){;
                        echo null;
                                              }?>
                    </td>
                    <td><?php if
                        ($date = new DateTime($row['update_time'])){
                        echo $date -> format('Y-m-d');
                        }
                        else if($date = null){
                            echo null;
                        }?>
                    </td>


                
                
                </tr>
                
                <?php endforeach; ?>
            </tbody>
        </table>
           
<footer></footer>