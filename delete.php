<?php

mb_internal_encoding("UTF8");

$dsn = "mysql:dbname=registration;host=localhost;charset=utf8";

$user = "root";
$password = "";
$data = [];

$dbh = new PDO($dsn, $user, $password);

try{
    $pdo = new PDO($dsn, $user, $password);
} catch(PDOException $e){
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$sql = "SELECT family_name, last_name, family_name_kana, last_name_kana, mail, password, gender, postal_code, prefecture, address_1, address_2, authority FROM account where id = {$_POST['id']}";

//$family_name = filter_input(INPUT_POST, 'family_name');
//$last_name = filter_input(INPUT_POST, 'last_name');
//$family_name_kana = filter_input(INPUT_POST, 'family_name_kana');
//$last_name_kana = filter_input(INPUT_POST, 'last_name_kana');
//$mail = filter_input(INPUT_POST, 'mail');
//$password = filter_input(INPUT_POST, 'password');
echo "select * from account where id in {$_POST['id']}";

$stmt = $pdo->query($sql);

$row = $stmt->fetch(PDO::FETCH_ASSOC);//　$rowに$_POST['id']のユーザー列をfetch(PDO::FETCH_ASSOC)にて取得

?>

<!docutype HTML>
<html lang = "ja">

<head>
    <meta charset = "utf-8">
    
    <title>アカウント削除画面</title>
    <link rel = "stylesheet" type = "text/css" href = "style6.css">
</head>

<body>
    <header></header>
    
    <h1>アカウント削除画面</h1>
    
    <form method = "post" action= "delete_confirm.php">
        
        <div>
            <label>名前(性)</label>
            <?php echo ($row['family_name']); ?>
        </div>
        
        <div>
            <label>名前(名)</label>
            <?php echo $row['last_name']; ?>
        </div>
        
        <div>
            <label>カナ(性)</label>
            <?php echo $row['family_name_kana']; ?>
        </div>
    
        <div>
            <label>カナ(名)</label>
            <?php echo $row['last_name_kana']; ?>
        </div>

        <div>
            <label>メールアドレス</label>
            <?php echo $row['mail']; ?>
        </div>
        
        <div>
           <label>パスワード</label>
           <?php 
            $password = $row['password']??'';
            $pass = mb_strlen($password, 'UTF-8');
            for ($i=1; $i<=$pass; $i++){
                echo "●";
            } ?>
        
        </div>
        
        <div>
            <label>性別</label>
            <?php 
            if($row['gender'] == 0){
                echo "男";
            } else if($row['gender'] == 1){
                echo "女";
            }
            ?>
        </div>
        
        <div>
            <label>郵便番号</label>
            <?php echo $row['postal_code']; ?>
        </div>
        
        <div>
            <label>住所（都道府県）</label>
            <?php echo $row['prefecture']; ?>
        </div>
        
        <div>
            <label>住所（市区町村）</label>
            <?php echo $row['address_1']; ?>
        </div>
        
        <div>
            <label>住所（番地）</label>
            <?php echo $row['address_2']; ?>
        </div>
        
        <div>
            <label>アカウント権限</label>
            <?php
            if($row['authority'] == 0){
                echo "一般";
            } else if($row['authority'] == 1){
                echo "管理者";
            }
        
            ?>
        </div>
        
        <div>
            <input type = "submit" class = "submit" value = "確認する">
        </div>
        
    </form>

         <footer></footer>

</body>
</html>