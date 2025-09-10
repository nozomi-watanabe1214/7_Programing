<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント登録画面</title>
        <link rel = "stylesheet" type = "text/css" href = "style2.css">
    </head>
    
    <body>
    <h1>アカウント登録画面</h1>
    <form method = "post" action = "regist_confirm.php">
        <div>
            <label>名前(性)</label>
            <input type = "text" class = "text" size = "35" name ="familyname">
        </div> 
        
        <div>
            <label>名前(名)</label>
            <input type = "text" class ="text" size = "35" name = "lastname">
        </div>
        
        <div>
            <label>カナ(性)</label>
            <input type = "text" class = "text"
                   size = "35" name = "familyname_kana">
        </div>
        
        <div>
            <label>カナ(名)</label>
            <input type = "text" class = "text"
                   size = "35" name = "lastname_kana">
        </div>
        
        <div>
            <label>メールアドレス</label>
            <input type = "text" class = "text"
                   size = "35" name = "mail">   
        </div>
        
        <div>
            <label>パスワード</label>
            <input type = "text" class = "text"
                   size = "35" name = "password">
        </div>
        
        <div>
            <label>性別</label>
            <input type="radio" name = "gender" value = "XXX">男
            <input type = "radio" name = "gender" value = "XXX">女
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