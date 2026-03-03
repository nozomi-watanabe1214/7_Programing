<?php

mb_internal_encoding("UTF8");

$dsn = "mysql:dbname=registration;host=localhost;charset=utf8";

$user = "root";
$password = "";

$data = [];

$dbh = new PDO($dsn, $user, $password);

$dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

if (isset($_POST["search"])){
    if (isset($_POST["search_family_name"]) && empty($_POST["search_last_name"])&& empty($_POST["search_family_name_kana"]) && empty($_POST["search_last_name_kana"]) && 
    empty($_POST["search_mail"]) && 
    isset($_POST["search_gender"]) && isset($_POST["search_authority"])){
        $search_familyname = $_POST["search_family_name"];
        $search_lastname = '';
        $search_familyname_kana = '';
        $search_lastname_kana = '';
        $search_mail = '';
        $search_gender = $_POST["search_gender"];
        $search_authority = $_POST["search_authority"];
    }
    
    if (isset($_POST["search_familyname"]) && isset($_POST["search_last_name"])&& empty($_POST["search_family_name_kana"]) && empty($_POST["search_last_name_kana"]) && 
    empty($_POST["search_mail"]) && 
    isset($_POST["search_gender"]) && isset($_POST["search_authority"])){
        $search_familyname = $_POST["search_family_name"];
        $search_lastname = $_POST["search_last_name"];
        $search_familyname_kana = '';
        $search_lastname_kana = '';
        $search_mail = '';
        $search_gender = $_POST["search_gender"];
        $search_authority = $_POST["search_authority"];
    }
    
    if (isset($_POST["search_familyname"]) && isset($_POST["search_last_name"])&& isset($_POST["search_family_name_kana"]) && empty($_POST["search_last_name_kana"]) && 
    empty($_POST["search_mail"]) && 
    isset($_POST["search_gender"]) && isset($_POST["search_authority"])){
        $search_familyname = $_POST["search_family_name"];
        $search_lastname = $_POST["search_last_name"];
        $search_familyname_kana = $_POST["search_family_name_kana"];
        $search_lastname_kana = '';
        $search_mail = '';
        $search_gender = $_POST["search_gender"];
        $search_authority = $_POST["search_authority"];
    }
    
    if (isset($_POST["search_familyname"]) && isset($_POST["search_last_name"])&& isset($_POST["search_family_name_kana"]) && isset($_POST["search_last_name_kana"]) && 
    empty($_POST["search_mail"]) && 
    isset($_POST["search_gender"]) && isset($_POST["search_authority"])){
        $search_familyname = $_POST["search_family_name"];
        $search_lastname = $_POST["search_last_name"];
        $search_familyname_kana = $_POST["search_family_name_kana"];
        $search_lastname_kana = $_POST["search_last_name_kana"];
        $search_mail = '';
        $search_gender = $_POST["search_gender"];
        $search_authority = $_POST["search_authority"];
    }
    
    if (isset($_POST["search_familyname"]) && isset($_POST["search_last_name"])&& isset($_POST["search_family_name_kana"]) && isset($_POST["search_last_name_kana"]) && 
    isset($_POST["search_mail"]) && 
    isset($_POST["search_gender"]) && isset($_POST["search_authority"])){
        $search_familyname = $_POST["search_family_name"];
        $search_lastname = $_POST["search_last_name"];
        $search_familyname_kana = $_POST["search_family_name_kana"];
        $search_lastname_kana = $_POST["search_last_name_kana"];
        $search_mail = $_POST["search_mail"];
        $search_gender = $_POST["search_gender"];
        $search_authority = $_POST["search_authority"];
    }
    
    $sql = "SELECT * FROM account WHERE name like '%{$search_name}%' and last_name like '%{$search_last_name}%' and family_name_kana like '%{$search_family_name_kana}%' and last_name_kana like '%{$search_last_name_kana}%' and mail like '%{$search_mail}%' and gender like '%{$search_gender}%' and authority like '%{$search_authority}%'";
    
    $rec = $dbh->prepare($sql);
    $rec->execute();
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
    <table border="1" style="border-collapse: collapse">
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
        
        <tr>
    <input type="submit" name="search" value="検索">
        </tr>
</table>
</form>
<br />
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
                    <td>
                        <?php
                        if(empty($row['registered_time'])){
                            echo "";
                           
                        } 
                        elseif($date = new DateTime($row['registered_time'])){
                            echo $date -> format('Y-m-d');
                            
                                // 何も表示しない場合はここを空欄にする
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if(empty($row['update_time'])){
                            echo "";
                        }
                        elseif($date = new DateTime($row['update_time'])){
                            echo $date -> format('Y-m-d');
                        }?>
                        
                    </td>
                    
                        <?php
                        echo "<form action = update.php method = post>";
                        echo "<input type = hidden name = id value =".$row['id'].">";
                        echo "<td><input type = submit value = 更新></td>";
                        echo"</form>";
                        ?>
                   
                        <?php
                        echo "<form action = delete.php method = post>";
                        echo "<input type = hidden name = id value =".$row['id'].">";
                    //echo "<input type = hidden name = last_name value =".$row['last_name'].">";
                    //echo "<input type = hidden name = family_name_kana value =".$row['family_name_kana'].">";
                    //echo "<input type = hidden name = last_name_kana value =".$row['last_name_kana'].">";
                    //echo "<input type = hidden name = mail =".$row['mail'].">";
                    //echo "<input type = hidden name = password value =".$_POST['password'].">";
                    echo "<td><input type = submit value = 削除></td>";
                    
                    echo "</form>";
                        ?>
                    </tr>
                
                <?php endforeach; ?>
            </tbody>
        </table>
           
<footer></footer>