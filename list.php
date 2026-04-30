<?php

//error_reporting(0);
session_start();

mb_internal_encoding("UTF8");

$dsn = "mysql:dbname=registration;host=localhost;charset=utf8";

$user = "root";
$password = "";

//$columns = [$_POST['search_family_name'],$_POST['search_last_name'],$_POST['search_family_name_kana'],$_POST['search_last_name_kana'],
//            $_POST['search_mail'],$_POST["search_gender"],$_POST['search_authority']]
$sql = "SELECT * FROM account WHERE 1=1";
$rec_list = [];

$dbh = new PDO($dsn, $user, $password, 
            [PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION]);

$search = isset($_POST['search']) ? trim ($_POST['search']) : "";

//foreach ($columns as $col) {
//    if (isset($_POST[$col]) && $_POST[$col] !== '') {
//        $sql .= "AND $col LIKE :$col";
//        $rec_list[":$col"] = '%'.$_POST[$col].'%';
//    }
//}
$sql .= " ORDER BY ID DESC";
   
if ($search === "") { 
//     if (isset($_POST["search_family_name"]) && isset($_POST["search_last_name"])&& 
//        isset($_POST["search_family_name_kana"]) && isset($_POST["search_last_name_kana"]) && 
//        isset($_POST["search_mail"]) && 
//        isset($_POST["search_gender"]) && isset($_POST["search_authority"])){
//         $search_family_name = $_POST["search_family_name"];
//         $search_last_name = $_POST["search_last_name"];
//         $search_family_name_kana = $_POST["search_family_name_kana"];
//         $search_mail = $_POST["search_mail"];
          

//    $conditions = array();//この配列$conditionsをANDでつなげる？？
//
//         if (isset($_POST["search_family_name"]) && $_POST["search_family_name"]!='') {
//         //$_POST[]がある かつ 空でないとき
//             $conditions[] = "family_name like '%".$_POST["search_family_name"]."%'";
//         }
//         if (isset($_POST["search_last_name"]) && $_POST["search_last_name"]!='') {
//             $conditions[] = "last_name like '%".$_POST["search_last_name"]."%'";
//         }
//         if (isset($_POST["search_family_name_kana"]) && $_POST["search_family_name_kana"]!='') {
//             $conditions[] = "family_name_kana '%".$_POST["search_family_name_kana"]."%'";
//         }
//         if (isset($_POST["search_last_name_kana"]) && $_POST["search_last_name_kana"]!='') {
//             $conditions[] = "last_name_kana like '%".$_POST["search_last_name_kana"]."%'";
//         }
//         if (isset($_POST["search_mail"]) && $_POST["search_mail"]!='') {
//             $conditions[] = "mail like '%".$_POST["search_mail"]."%'";
//         }
//         if (isset($_POST["search_gender"]) && $_POST["search_gender"]!='') {
//             $conditions[] = "gender = $search_gender";
//         }
//         if (isset($_POST["search_authority"]) && $_POST["search_authority"]!='') {
//             $conditions[] = "authority = $search_authority";
//         }
//         var_dump(implode(" and ", $conditions));
//         
//         exit;
    
//    $sql = "SELECT * FROM account ORDER BY ID DESC";
//    
//    $rec = $dbh->prepare($sql);
//    $rec->execute();
//
} elseif (isset($_POST['search_family_name'])) {//もしfamily_nameがセット(入力)されたら、
    
    $family_name = '%'.$_POST['search_family_name'].'%';
    $last_name = '%'.$_POST['search_last_name'].'%';
//    $family_name_kana = '%'.$_POST['search_family_name_kana'].'%';
//    $last_name_kana = '%'.$_POST['search_last_name_kana'].'%';
//    $mail = '%'.$_POST['search_mail'].'%';
//    $search_gender = $_POST['search_gender'];
//    $search_authority = $_POST['search_authority'];
    
    $sql = "SELECT * FROM account WHERE family_name LIKE '%$family_name%' ORDER BY ID DESC";
    //テーブルaccountからカラム「family_name」に$family_nameを含むものをSELECTする。
       
    $rec = $dbh->prepare($sql);
    $rec->execute();
}

$sql = "SELECT * FROM account";
if (isset($_POST['search_family_name']) && $_POST['search_family_name'] != '') {
    $sql .= "WHERE family_name LIKE '%".$_POST['search_family_name']."%' ";
}
if (isset($_POST['search_last_name']) && $_POST['search_last_name'] != '') {
    $sql .= "WHERE last_name LIKE '%".$_POST['search_last_name']."%' ";
}
$sql .= " ORDER BY ID DESC";
var_dump($sql);

if (isset($rec)) $rec_list = $rec->fetchAll(PDO::FETCH_ASSOC);
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

         <?php
        if ($search !== ''): ?>
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
                foreach ($rec_list as $rec):
                ?>

                <tr>
                    <td><?php 
                        echo ($rec['id']) ?></td>
                    
                    <td><?php 
                            echo ($rec['family_name'])?></td>
                    
                    <td><?php 
                            echo ($rec['last_name'])?></td>
                    
                    <td><?php 
                            echo ($rec['family_name_kana'])?></td>
                    
                    <td><?php 
                            echo ($rec['last_name_kana'])?></td>
                    
                    <td><?php 
                            echo ($rec['mail'])?></td>
                    
                    <td>
                        <?php 
                            if($rec['gender'] == 0){
                                echo "男";
                            } else if($rec['gender'] == 1){
                                echo "女";
                            } ?>
                         <?php if (isset($_POST['example']) && $_POST['example'] == "1") echo 'checked'; ?>
                    </td>
                    
                    <td>
                        <?php 
                            if($rec['authority'] == 0){
                                echo "一般";
                            } else if($rec['authority'] == 1){
                                echo "管理者";
                            } ?>
                    </td>
                    <td>
                        <?php 
                            if($rec['delete_flag'] == 0){
                                echo "有効";
                            } else if($rec['delete_flag'] == 1){
                                echo "無効";
                            } ?>
                    </td>
                    <td>
                        <?php
                            if(empty($rec['registered_time'])){
                                echo "";
                            } elseif($rec_list = new DateTime($rec['registered_time'])){
                                echo $rec_list -> format('Y-m-d');
                                // 何も表示しない場合はここを空欄にする
                            } ?>
                    </td>
                    <td>
                        <?php
                            if(empty($rec['update_time'])){
                                echo "";
                            } elseif($rec_list = new DateTime($rec['update_time'])){
                                echo $rec_list -> format('Y-m-d');
                            } ?>
                        
                    </td>
                    <?php 
                    echo "<form action = update.php method = post>";
                    echo "<input type = hidden name = id value =".$rec['id'].">";
                    echo "<td><input type = submit value = 更新></td>";
                    echo"</form>";
                        ?>
                    
                    <?php 
                    echo "<form action = delete.php method = post>";
                    echo "<input type = hidden name = id value =".$rec['id'].">";
                    echo "<td><input type = submit value = 削除></td>";
                    
                    echo "</form>";
                        ?>
                    </tr>
                
                <?php endforeach; ?>
                
        </table>
        <?php endif; ?>
        

<footer></footer>