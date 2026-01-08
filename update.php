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

$sql = "SELECT family_name, last_name, family_name_kana, last_name_kana, mail, password, gender, postal_code, prefecture, address_1, address_2, authority, delete_flag, registered_time, update_time FROM account where id = {$_POST['id']}";

$stmt = $pdo->query($sql);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント更新画面</title>
        <link rel = "stylesheet" type = "text/css" href = "style9.css">
    </head>
    
    <body>
        <header></header>
        
    <h1>アカウント登録画面</h1>
    <form method = "post" action = "update_confirm.php">
             
        <div>
            <label>名前(性)</label>
            <input type="text" class ="text" size = "35" name= "family_name" value="<?php echo ($row['family_name'])?>" maxlength = "10" pattern = "^[ぁ-ん一-龠ー]*$" required>
        </div> 
        
        <div>
            <label>名前(名)</label>
            <input type = "text" class ="text" size = "35" name = "last_name" value="<?php echo ($row['last_name'])?>" maxlength = "10" pattern = "^[ぁ-ん一-龠ー]*$" required>
        </div>
        
        <div>
            <label>カナ(性)</label>
            <input type = "text" class = "text"
                   size = "35" name = "family_name_kana" value="<?php echo ($row['family_name_kana'])?>" maxlength = "10" pattern = "^[ァ-ンヴー]*$" required>
        </div>
        
        <div>
            <label>カナ(名)</label>
            <input type = "text" class = "text"
                   size = "35" name = "last_name_kana" value="<?php echo ($row['last_name_kana'])?>" maxlength = "10" pattern = "^[ァ-ンヴー]*$"　required>
        </div>
        
        <div>
            <label>メールアドレス</label>
            <input type = "text" class = "text"
                   size = "35" name = "mail" value="<?php echo ($row['mail'])?>" maxlength = "100" pattern = "^[0-9a-zA-Z\-\@\.]*$" required>   
        </div>
        
        <div>
            <label>パスワード</label>
            <input type = "password" class = "text"
                   size = "35" name = "password" maxlength = "10" pattern = "^[a-zA-Z0-9]*$" required>
        </div>
        
        <div>
            <label>性別</label>
            <label><input type = "radio" name = "gender" value = "0">男</label>
            <label><input type = "radio" name = "gender" value = "1" required>女</label>
            
        </div>
        
        <div>
            <label>郵便番号</label>
            <input type = "text" class = "text"
                   size = "35" name = "postal_code" value="<?php echo ($row['postal_code'])?>"pattern="^[0-9]{7}$" required>
        </div>
        
        <div>
            <label>住所（都道府県）</label>
            <select name="prefecture" required>
                <option value="北海道"
                        <?php
                        if($row['prefecture'] == "北海道"){
                            echo 'selected';
                        }
                        ?>>北海道</option>
                <option value="青森県"
                        <?php
                        if($row['prefecture'] == "青森県"){
                            echo 'selected';
                        }
                        ?>>青森県</option>
                <option value="岩手県"
                        <?php
                        if($row['prefecture'] == "岩手県"){
                            echo 'selected';
                        }
                        ?>>岩手県</option>
                <option value="宮城県"
                        <?php
                        if($row['prefecture'] == "宮城県"){
                            echo 'selected';
                        }
                        ?>>宮城県</option>
                <option value="秋田県"
                        <?php
                        if($row['prefecture'] == "秋田県"){
                            echo 'selected';
                        }
                        ?>>秋田県</option>
                <option value="山形県"
                        <?php
                        if($row['prefecture'] == "山形県"){
                            echo 'selected';
                        }
                        ?>>山形県</option>
                <option value="福島県"
                        <?php
                        if($row['prefecture'] == "福島県"){
                            echo 'selected';
                        }
                        ?>>福島県</option>
                <option value="茨城県"
                        <?php
                        if($row['prefecture'] == "茨城県"){
                            echo 'selected';
                        }
                        ?>>茨城県</option>
                <option value="栃木県"
                        <?php
                        if($row['prefecture'] == "栃木県"){
                            echo 'selected';
                        }
                        ?>>栃木県</option>
                <option value="群馬県"
                        <?php
                        if($row['prefecture'] == "群馬県"){
                            echo 'selected';
                        }
                        ?>>群馬県</option>
                <option value="埼玉県"
                        <?php
                        if($row['prefecture'] == "埼玉県"){
                            echo 'selected';
                        }
                        ?>>埼玉県</option>
                <option value="千葉県"
                        <?php
                        if($row['prefecture'] == "千葉県"){
                            echo 'selected';
                        }
                        ?>>千葉県</option>
                <option value="東京都"
                        <?php
                        if($row['prefecture'] == "東京都"){
                            echo 'selected';
                        }
                        ?>>東京都</option>
                <option value="神奈川県"
                        <?php
                        if($row['prefecture'] == "神奈川県"){
                            echo 'selected';
                        }
                        ?>>神奈川県</option>
                <option value="新潟県"
                        <?php
                        if($row['prefecture'] == "新潟県"){
                            echo 'selected';
                        }
                        ?>>新潟県</option>
                <option value="富山県"
                        <?php
                        if($row['prefecture'] == "富山県"){
                            echo 'selected';
                        }
                        ?>>富山県</option>
                <option value="石川県"
                        <?php
                        if($row['prefecture'] == "石川県"){
                            echo 'selected';
                        }
                        ?>>石川県</option>
                <option value="福井県"
                        <?php
                        if($row['prefecture'] == "福井県"){
                            echo 'selected';
                        }
                        ?>>福井県</option>
                <option value="山梨県"
                        <?php
                        if($row['prefecture'] == "山梨県"){
                            echo 'selected';
                        }   
                        ?>>山梨県</option>
                <option value="長野県"
                        <?php
                        if($row['prefecture'] == "長野県"){
                            echo 'selected';
                        }
                        ?>>長野県</option>
                <option value="岐阜県"
                        <?php
                        if($row['prefecture'] == "岐阜県"){
                            echo 'selected';
                        }
                        ?>>岐阜県</option>
                <option value="静岡県"
                        <?php
                        if($row['prefecture'] == "静岡県"){
                            echo 'selected';
                        }
                        ?>>静岡県</option>
                <option value="愛知県"
                        <?php
                        if($row['prefecture'] == "愛知県"){
                            echo 'selected';
                        }
                        ?>>愛知県</option>
                <option value="三重県"
                        <?php
                        if($row['prefecture'] == "三重県"){
                            echo 'selected';
                        }
                        ?>>三重県</option>
                <option value="滋賀県"
                        <?php
                        if($row['prefecture'] == "滋賀県"){
                            echo 'selected';
                        }
                        ?>>滋賀県</option>
                <option value="京都府"
                        <?php
                        if($row['prefecture'] == "京都府"){
                            echo 'selected';
                        }
                        ?>>京都府</option>
                <option value="大阪府"
                        <?php
                        if($row['prefecture'] == "大阪府"){
                            echo 'selected';
                        }
                        ?>>大阪府</option>
                <option value="兵庫県"
                        <?php
                        if($row['prefecture'] == "兵庫県"){
                            echo 'selected';
                        }
                        ?>>兵庫県</option>
                <option value="奈良県"
                        <?php
                        if($row['prefecture'] == "奈良県"){
                            echo 'selected';
                        }
                        ?>>奈良県</option>
                <option value="和歌山県"
                        <?php
                        if($row['prefecture'] == "和歌山県"){
                            echo 'selected';
                        }
                        ?>>和歌山県</option>
                <option value="鳥取県"
                        <?php
                        if($row['prefecture'] == "鳥取県"){
                            echo 'selected';
                        }
                        ?>>鳥取県</option>
                <option value="島根県"
                        <?php
                        if($row['prefecture'] == "島根県"){
                            echo 'selected';
                        }
                        ?>>島根県</option>
                <option value="岡山県"
                        <?php
                        if($row['prefecture'] == "岡山県"){
                            echo 'selected';
                        }
                        ?>>岡山県</option>
                <option value="広島県"
                        <?php
                        if($row['prefecture'] == "広島県"){
                            echo 'selected';
                        }
                        ?>>広島県</option>
                <option value="山口県"
                        <?php
                        if($row['prefecture'] == "山口県"){
                             echo 'selected';
                        }
                        ?>>山口県</option>
                <option value="徳島県"
                        <?php
                        if($row['prefecture'] == "徳島県"){
                            echo 'selected';
                        }
                        ?>>徳島県</option>
                <option value="香川県"
                        <?php
                        if($row['prefecture'] == "香川県"){
                            echo 'selected';
                        }
                        ?>>香川県</option>
                <option value="愛媛県"
                        <?php
                        if($row['prefecture'] == "愛媛県"){
                            echo 'selected';
                        }
                        ?>>愛媛県</option>
                <option value="高知県"
                        <?php
                        if($row['prefecture'] == "高知県"){
                            echo 'selected';
                        }
                        ?>>高知県</option>
                <option value="福岡県"
                        <?php
                        if($row['prefecture'] == "福岡県"){
                            echo 'selected';
                        }
                        ?>>福岡県</option>
                <option value="佐賀県"
                        <?php
                        if($row['prefecture'] == "佐賀県"){
                            echo 'selected';
                        }
                        ?>>佐賀県</option>
                <option value="長崎県"
                        <?php
                        if($row['prefecture'] == "長崎県"){
                            echo 'selected';
                        }
                        ?>>長崎県</option>
                <option value="熊本県"
                        <?php
                        if($row['prefecture'] == "熊本県"){
                            echo 'selected';
                        }
                        ?>>熊本県</option>
                <option value="大分県"
                        <?php
                        if($row['prefecture'] == "大分県"){
                            echo 'selected';
                        }
                        ?>>大分県</option>
                <option value="宮崎県"
                        <?php
                        if($row['prefecture'] == "宮崎県"){
                            echo 'selected';
                        }
                        ?>>宮崎県</option>
                <option value="鹿児島県"
                        <?php
                        if($row['prefecture'] == "鹿児島県"){
                            echo 'selected';
                        }
                        ?>>鹿児島県</option>
                <option value="沖縄県"
                        <?php
                        if($row['prefecture'] == "沖縄県"){
                            echo 'selected';
                        }
                        ?>>沖縄県</option>
            </select>
        </div>
        
        <div>
            <label>住所（市区町村）</label>
            <input type = "text" class = "text"
                   size = "35" name = "address_1" value="<?php echo ($row['address_1'])?>"maxlength = "10" pattern = "^[ぁ-んァ-ンヴ一-龠ー0-9０-９\-－\s　]*$" required>
        </div>
        
        <div>
            <label>住所（番地）</label>
            <input type = "text" class = "text"
                   size = "35" name = "address_2" value="<?php echo ($row['address_2'])?>"maxlength = "100" pattern = "^[ぁ-んァ-ンヴ一-龠ー0-9０-９\-－\s　]*$" required>
        </div>
        
        <div>
            <label>アカウント権限</label>
            <select name = "authority" required>
                <option value="0"
                        <?php
    if($row['authority'] == 0){
        echo 'selected';
    }
                        ?>>一般</option>
                
                <option value="1"
                        <?php
                        if($row['authority'] == 1){
                            echo 'selected';
                        }
                        ?>>管理者</option>
            </select>
        </div> 
        
        <div>
            <input type = "submit" class = "submit" value = "確認する">
            <input type = "hidden" value = "<?php 
                                        echo $_POST['id']; ?>">
        </div>
            </form>
        

        
        <footer></footer>
    
    </body>
</html>