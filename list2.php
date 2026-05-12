<?php

//error_reporting(0);
session_start();

mb_internal_encoding("UTF8");

$dsn = "mysql:dbname=registration;host=localhost;charset=utf8";

$user = "root";
$password = "";

$dbh = new PDO($dsn, $user, $password, 
            [PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION]);

$rec_list = [];

//$post = isset($_POST[$post]) ? trim ($_POST[$post]) : "";



$sql = "SELECT * FROM account WHERE 1=1 ";

$columns = [
    'search_family_name' => 'family_name',
    'search_last_name' => 'last_name',
    'search_family_name_kana' => 'family_name_kana',
    'search_last_name_kana' => 'last_name_kana',
    'search_mail' => 'mail',
    'search_gender' => 'gender',
    'search_authority' => 'authority'
];

foreach ($columns as $search => $column) {
    if (isset($_POST[$search]) && $_POST[$search] != '')  {
        $sql .= "AND $column LIKE '%".$_POST[$search]."%' ";
//echo $sql;
    }
}//$post=search_family_name,$column=family_nameのようにセットの配列を複数繰り返し$colmuns[]とする

$sql .= "ORDER BY id DESC";

$column = $dbh->prepare($sql);
$column->execute();

if (isset($column)) $rec_list = $column->fetchAll(PDO::FETCH_ASSOC);
$dbh=null;

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
        <!--検索-->
<form action="" method = "POST">
    <table>
        <tr>
            <th>名前（性）</th>
            <td>
                <input type = "text" name = "search_family_name" 
                       size = "50" value = "<?php 
                                              if(!empty($_POST['search_family_name'])){
                                              echo $_POST['search_family_name']; } ?>"> 
            </td>
        
        <th>名前（名）</th>
            <td>
                <input type = "text" name = "search_last_name" 
                       size = "50" value = "<?php 
                                                  if(!empty($_POST['search_last_name'])){
                                              echo $_POST['search_last_name']."\n"; } ?>">
            </td>
        </tr>
        
        <tr>
            <th>カナ（性）</th>
            <td>
                <input type = "text" name = "search_family_name_kana" 
                       size = "50" value = "<?php 
                                                  if(!empty($_POST['search_family_name_kana'])){
                                              echo $_POST['search_family_name_kana']; } ?>">
            </td>
            
            <th>カナ（名）</th>
            <td>
                <input type = "text" name = "search_last_name_kana" 
                       size = "50" value = "<?php 
                                                  if(!empty($_POST['search_last_name_kana'])){
                                                 echo $_POST['search_last_name_kana']."\n"; } ?>">
            </td>
        </tr>
        
        <tr>
            <th>メールアドレス</th>
            <td>
                <input type = "text" name = "search_mail" 
                       size = "50" value = "<?php 
                                                  if(!empty($_POST['search_mail'])){
                                              echo $_POST['search_mail']; } ?>">
            </td>
            
            <th>性別</th>
            <td>
                <input type = "radio" name = "search_gender" value = "0" checked>男
                <input type = "radio" name = "search_gender" value = "1">女 
                <input type = "radio" name = "search_gender" value = "">両方 
            </td>
        </tr>  
        
        <tr>
            <th>アカウント権限</th>
            <td>
                <select name = "search_authority">
                    <option value="0" <?php echo 'selected'; 
                            ?>>一般
                    </option>
                    <option value="1">管理者</option>
                    <option value=""></option>
                </select>
            </td>
            
            <th></th>
            <td></td>
        </tr>
            </table>
    <div>
                <input type = "submit" name = "search" value="検索">
    </div>
        
    
</form>
<br />

         <?php if (isset($_POST['search'])): ?>
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
                    <th colspan = "2">操作</th>
                </tr>
            </thead>
            
            <tbody>
            
            <?php
                foreach ($rec_list as $column):
                ?>

                <tr>
                    <td><?php 
                        echo ($column['id']) ?></td>
                    
                    <td><?php 
                            echo ($column['family_name'])?></td>
                    
                    <td><?php 
                            echo ($column['last_name'])?></td>
                    
                    <td><?php 
                            echo ($column['family_name_kana'])?></td>
                    
                    <td><?php 
                            echo ($column['last_name_kana'])?></td>
                    
                    <td><?php 
                            echo ($column['mail'])?></td>
                    
                    <td>
                        <?php 
                            if($column['gender'] == 0){
                                echo "男";
                            } else if($column['gender'] == 1){
                                echo "女";
                            } ?>
                         <?php if (isset($_POST['example']) && $_POST['example'] == "1") echo 'checked'; ?>
                    </td>
                    
                    <td>
                        <?php 
                            if($column['authority'] == 0){
                                echo "一般";
                            } else if($column['authority'] == 1){
                                echo "管理者";
                            } ?>
                    </td>
                    <td>
                        <?php 
                            if($column['delete_flag'] == 0){
                                echo "有効";
                            } else if($column['delete_flag'] == 1){
                                echo "無効";
                            } ?>
                    </td>
                    <td>
                        <?php
                            if(empty($column['registered_time'])){
                                echo "";
                            } elseif($rec_list = new DateTime($column['registered_time'])){
                                echo $rec_list -> format('Y-m-d');
                                // 何も表示しない場合はここを空欄にする
                            } ?>
                    </td>
                    <td>
                        <?php
                            if(empty($column['update_time'])){
                                echo "";
                            } elseif($rec_list = new DateTime($column['update_time'])){
                                echo $rec_list -> format('Y-m-d');
                            } ?>
                        
                    </td>
                    <?php 
                    echo "<form action = update.php method = post>";
                    echo "<input type = hidden name = id value =".$column['id'].">";
                    echo "<td><input type = submit value = 更新></td>";
                    echo"</form>";
                        ?>
                    
                    <?php 
                    echo "<form action = delete.php method = post>";
                    echo "<input type = hidden name = id value =".$column['id'].">";
                    echo "<td><input type = submit value = 削除></td>";
                    
                    echo "</form>";
                        ?>
                    </tr>
                
                <?php endforeach; ?>
                
        </table>
        <?php endif; ?>
        

<footer></footer>