<?php

mb_internal_encoding("UTF8");

$dsn = "mysql:dbname=registration;host=localhost;charset=utf8";

$user = "root";
$password = "";
$data = [];


$data = [];

$dbh = new PDO($dsn, $user, $password);

try{
    $pdo = new PDO($dsn, $user, $password);
} catch(PDOException $e){
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$stmt = $pdo->prepare("SELECT * FROM account WHERE id = '".$_POST['id']."'");

//$family_name = filter_input(INPUT_POST, 'family_name');
//$last_name = filter_input(INPUT_POST, 'last_name');
//$family_name_kana = filter_input(INPUT_POST, 'family_name_kana');
//$last_name_kana = filter_input(INPUT_POST, 'last_name_kana');
//$mail = filter_input(INPUT_POST, 'mail');
//$password = filter_input(INPUT_POST, 'password');
//echo "select * from account where id in ($id)";

$stmt -> execute(); 

$data = $stmt -> fetch();

?>

//idデータを1つもらう

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
    
    <form method="post" action="?">

        <div>
            <label>名前(性)</label>
            <?php echo $_POST['family_name']; ?>
        </div>
        
        <div>
            <label>名前(名)</label>
            <?php echo $_POST['last_name']; ?>
        </div>
        
        <div>
            <label>カナ(性)</label>
            <?php echo $_POST['family_name_kana']; ?>
        </div>
    
        <div>
            <label>カナ(名)</label>
            <?php echo $_POST['last_name_kana']; ?>
        </div>

        <div>
            <label>メールアドレス</label>
            <?php echo $_POST['mail']; ?>
        </div>
        
        <div>
           <label>パスワード</label>
           <?php 
            $password = $_POST['password']??'';
            $pass = mb_strlen($password, 'UTF-8');
            for ($i=1; $i<=$pass; $i++){
                echo "●";
            } ?>
        
        </div>
        
        <div>
            <label>性別</label>
            <?php 
            if($_POST['gender'] == 0){
                echo "男";
            } else if($_POST['gender'] == 1){
                echo "女";
            }
            ?>
        </div>
        
        <div>
            <label>郵便番号</label>
            <?php echo $_POST['postal_code']; ?>
        </div>
        
        <div>
            <label>住所（都道府県）</label>
            <?php echo $_POST['prefecture']; ?>
        </div>
        
        <div>
            <label>住所（市区町村）</label>
            <?php echo $_POST['address_1']; ?>
        </div>
        
        <div>
            <label>住所（番地）</label>
            <?php echo $_POST['address_2']; ?>
        </div>
        
        <div>
            <label>アカウント権限</label>
            <?php
            if($_POST['authority'] == 0){
                echo "一般";
            } else if($_POST['authority'] == 1){
                echo "管理者";
            }
        
            ?>
        </div>
    
         <footer></footer>
    </form>

</body>
</html>