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
    <form method = "post" action = "regist_complete.php">
    
    <div>
        <label>名前(性)</label>
        <?php $input_data = $_POST['familyname'];
if ($input_data = $_POST['familyname']) {
    echo ("<input type='text' size='35' name='familyname' value='$input_data'>");
} ?>
    </div>
    
    <div>
        <label>名前(名)</label>
        <?php echo $_POST['lastname']; ?>
    </div>
        
    <div>
        <label>カナ(性)</label>
        <?php echo $_POST['familyname_kana']; ?>
    </div>
    
    <div>
        <label>カナ(名)</label>
        <?php echo $_POST['lastname_kana']; ?>
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
        <label</div>
        
    
    
    </form></body></html>