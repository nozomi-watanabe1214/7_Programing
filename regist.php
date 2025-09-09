<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント登録画面</title>
        <link rel = "stylesheet" type = "text/css" href = "style2.css">
    </head>
    
    <body>
    <h1>アカウント登録画面</h1>
    <form method = "post" action = "mail_confirm.php">
        <div>
            <label>名前(性)</label>
            <input type = "text" class = "text" size = "35" name ="name">
        </div> 
        
        <div>
            <label>メールアドレス</label>
            <br>
            <input type = "text" class ="text" size = "35" name = "mail">
        </div>
        
        <div>
            <label>年齢</label>
            <br>
        <select class = "dropdown" name = "age">
            <option>選択してください</option>
            <script>
            for (var i = 18;i <= 65;i++){
            document.write ("<option ="+i+">" +i+"歳</option>");
            }
            </script>
        </select>
        </div>
        
        <div>
            <label>コメント</label>
            <br>
            <textarea cols = "40" rows = "10" name = "comments"></textarea>
        </div>
        
        <div>
            <input type = "submit" class = "submit" value = "送信する">
        </div>
    </form>
    
    </body>
</html>