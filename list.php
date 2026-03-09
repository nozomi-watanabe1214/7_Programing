<?php

mb_internal_encoding("UTF8");

$dsn = "mysql:dbname=registration;host=localhost;charset=utf8";

$user = "root";
$password = "";

$rec_list = [];

$dbh = new PDO($dsn, $user, $password);

$dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

if (isset($_POST["search"])){
    if (isset($_POST["family_name"]) && empty($_POST["last_name"])&& empty($_POST["family_name_kana"]) && empty($_POST["last_name_kana"]) && 
    empty($_POST["mail"]) && 
    isset($_POST["gender"]) && isset($_POST["authority"])){
        $search_family_name = $_POST["family_name"];
        $search_last_name = '';
        $search_family_name_kana = '';
        $search_last_name_kana = '';
        $search_mail = '';
        $search_gender = $_POST["gender"];
        $search_authority = $_POST["authority"];
    }
    
    if (isset($_POST["search_family_name"]) && isset($_POST["search_last_name"])&& empty($_POST["search_family_name_kana"]) && empty($_POST["search_last_name_kana"]) && 
    empty($_POST["search_mail"]) && 
    isset($_POST["search_gender"]) && isset($_POST["search_authority"])){
        $search_family_name = $_POST["search_family_name"];
        $search_last_name = $_POST["search_last_name"];
        $search_family_name_kana = '';
        $search_last_name_kana = '';
        $search_mail = '';
        $search_gender = $_POST["search_gender"];
        $search_authority = $_POST["search_authority"];
    }
    
    if (isset($_POST["search_family_name"]) && isset($_POST["search_last_name"])&& isset($_POST["search_family_name_kana"]) && empty($_POST["search_last_name_kana"]) && 
    empty($_POST["search_mail"]) && 
    isset($_POST["search_gender"]) && isset($_POST["search_authority"])){
        $search_family_name = $_POST["search_family_name"];
        $search_last_name = $_POST["search_last_name"];
        $search_family_name_kana = $_POST["search_family_name_kana"];
        $search_last_name_kana = '';
        $search_mail = '';
        $search_gender = $_POST["search_gender"];
        $search_authority = $_POST["search_authority"];
    }
    
    if (isset($_POST["search_family_name"]) && isset($_POST["search_last_name"])&& isset($_POST["search_family_name_kana"]) && isset($_POST["search_last_name_kana"]) && 
    empty($_POST["search_mail"]) && 
    isset($_POST["search_gender"]) && isset($_POST["search_authority"])){
        $search_family_name = $_POST["search_family_name"];
        $search_last_name = $_POST["search_last_name"];
        $search_family_name_kana = $_POST["search_family_name_kana"];
        $search_last_name_kana = $_POST["search_last_name_kana"];
        $search_mail = '';
        $search_gender = $_POST["search_gender"];
        $search_authority = $_POST["search_authority"];
    }
    
    if (isset($_POST["search_family_name"]) && isset($_POST["search_last_name"])&& isset($_POST["search_family_name_kana"]) && isset($_POST["search_last_name_kana"]) && 
    isset($_POST["search_mail"]) && 
    isset($_POST["search_gender"]) && isset($_POST["search_authority"])){
        $search_family_name = $_POST["search_family_name"];
        $search_last_name = $_POST["search_last_name"];
        $search_family_name_kana = $_POST["search_family_name_kana"];
        $search_last_name_kana = $_POST["search_last_name_kana"];
        $search_mail = $_POST["search_mail"];
        $search_gender = $_POST["search_gender"];
        $search_authority = $_POST["search_authority"];
    }
    
    $sql = "SELECT * FROM account WHERE family_name like '%{$search_family_name}%' and last_name like '%{$search_last_name}%' and family_name_kana like '%{$search_family_name_kana}%' and last_name_kana like '%{$search_last_name_kana}%' and mail like '%{$search_mail}%' and gender like '%{$search_gender}%' and authority like '%{$search_authority}%'";
    
    $rec = $dbh->prepare($sql);
    //$rec->execute();
    $rec_list = $rec->fetchAll(PDO::FETCH_ASSOC);

}else{
    $sql = 'SELECT id, family_name, last_name, family_name_kana, last_name_kana, mail, password, gender, postal_code, prefecture, address_1, address_2, authority, delete_flag, registered_time, update_time FROM account ORDER BY id DESC';
    $stmt = $dbh -> query($sql);
    $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
}

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
<form action="list.php" method="POST">
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
            </td>
        </tr>  
        
        <tr>
            <th>アカウント権限</th>
            <td>
                <select name = "authority">
                    <option value="0" <?php echo 'selected'; 
                            ?>>一般
                    </option>
                    <option value="1">管理者</option>
                </select>
            </td>
            
            <th></th>
            <td></td>
        </tr>
    </table>
    
    <div>
        <input type = "submit" name = "search" value = "検索">
    </div>    
</form>
<br />
        <table>
            <?php
                foreach ($rec_list as $rec):
                ?>

                <tr>
                    <th>ID</th>
                    <td><?php echo ($rec['id']) ?></td>
                    <th>名前（性）</th>
                    <td><?php echo ($rec['family_name'])?></td>
                    <th>名前（名）</th>
                    <td><?php echo ($rec['last_name'])?></td>
                    <th>カナ（性）</th>
                    <td><?php echo ($rec['family_name_kana'])?></td>
                    <th>カナ（名）</th>
                    <td><?php echo ($rec['last_name_kana'])?></td>
                    <th>メールアドレス</th>
                    <td><?php echo ($rec['mail'])?></td>
                    <th>性別</th>
                    <td><?php if($rec['gender'] == 0){
                            echo "男";
                            } else if($rec['gender'] == 1){
                                echo "女";
                            } ?>
                    </td>
                    <th>アカウント権限</th>
                    <td><?php if($rec['authority'] == 0){
                            echo "一般";
                            } else if($rec['authority'] == 1){
                                echo "管理者";
                            } ?>
                    </td>
                    
                    <th>削除フラグ</th>
                    <td><?php if($rec['delete_flag'] == 0){
                            echo "有効";
                            } else if($rec['delete_flag'] == 1){
                                echo "無効";
                            } ?>
                    </td>
                    <th>登録日時</th>
                    <td>
                        <?php
                        if(empty($rec['registered_time'])){
                            echo "";
                           
                        } 
                        elseif($date = new DateTime($rec['registered_time'])){
                            echo $date -> format('Y-m-d');
                            
                                // 何も表示しない場合はここを空欄にする
                        }
                        ?>
                    </td>
                    <th>更新日時</th>
                    <td>
                        <?php
                        if(empty($rec['update_time'])){
                            echo "";
                        }
                        elseif($date = new DateTime($rec['update_time'])){
                            echo $date -> format('Y-m-d');
                        }?>
                        
                    </td>
                    <th colspan = "2">操作</th>
                    <?php 
                    echo "<form action = update.php method = post>";
                    echo "<input type = hidden name = id value =".$row['id'].">";
                    echo "<td><input type = submit value = 更新></td>";
                    echo"</form>";
                        ?>
                    
                    <?php 
                    echo "<form action = delete.php method = post>";
                    echo "<input type = hidden name = id value =".$row['id'].">";
                    echo "<td><input type = submit value = 削除></td>";
                    
                    echo "</form>";
                        ?>
                    </tr>
                
                <?php endforeach; ?>
        </table>
           
<footer></footer>