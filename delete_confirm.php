<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント削除確認画面</title>
        <link rel = "stylesheet" type = "text/css" href = "style7.css">
    </head>
    
    <body>
        <header></header>
        
        <h1>アカウント削除確認画面</h1>
        <form method = "post">
            
        <div class = "confirm">
            <h2>本当に削除してもよろしいですか？</h2>
        </div>
        
        
        <input type = "submit" class = "button1" value = "前に戻る" formaction="javascript:history.back()">
    
        <input type = "submit" class = "button2" value = "削除する" formaction="delete_complete.php" method="post">
        
        </form>
        
        <footer></footer>
        
    </body>
</html>
