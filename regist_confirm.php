<!docutype HTML>
<html lang = "ja">

<head>
    <meta charset = "utf-8">
    
    <title>アカウント登録確認画面</title>
    <link rel = "stylesheet" type = "text/css" href = "style3.css">
</head>

<body>
    <header></header>
    
    <h1>アカウント登録確認画面</h1>
    
    <form method = "post" action = "?">
        
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
           <?php echo $_POST['password']; ?>
        </div>
        
        <div>
            <label>性別</label>
            <?php echo $_POST['gender']; ?>
        </div>
        
        <div>
            <label>郵便番号</label>
            <?php echo $_POST['postal_code']; ?>
        </div>
        
        <div>
            <label>住所（都道府県）</label>
            <?php echo $_POST['prefectures']; ?>
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
            <?php echo $_POST['authority']; ?>
        </div>
        
        
        <input type = "submit" class = "button1" value = "前に戻る"　formaction = "regist.php">
        
        <input type = "submit" class = "button2" value = "登録する" formaction = "insert.php">
        <input type = "hidden" value = "<?php 
                                        echo $_POST['family_name']; ?>" name = "family_name">
        <input type = "hidden" value = "<?php 
                                        echo $_POST['last_name']; ?>" name = "last_name">
        <input type = "hidden" value = "<?php 
                                        echo $_POST['family_name_kana']; ?>" name = "family_name_kana">
        <input type = "hidden" value = "<?php 
                                        echo $_POST['last_name_kana']; ?>" name = "last_name_kana">
        </form>
    
    <footer></footer>

</body>
</html>