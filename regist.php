<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント登録画面</title>
        <link rel = "stylesheet" type = "text/css" href = "style2.css">
    </head>
    
    <body>
        <header></header>
        
    <h1>アカウント登録画面</h1>
    <form method = "post" action = "regist_confirm.php">
        <div>
            <label>名前(性)</label>
            <input type = "text" class = "text" size = "35"  name ="familyname" maxlength = "10" pattern = "[\u4E00-\u9FFF\u3040-\u309Fー]*+$">
        </div> 
        
        <div>
            <label>名前(名)</label>
            <input type = "text" class ="text" size = "35" name = "lastname" maxlength = "10" pattern = "[\u4E00-\u9FFF\u3040-\u309Fー]*+$">
        </div>
        
        <div>
            <label>カナ(性)</label>
            <input type = "text" class = "text"
                   size = "35" name = "familyname_kana" maxlength = "10" pattern = "[\uFF66-\uFF9D\uFF0D]+$">
        </div>
        
        <div>
            <label>カナ(名)</label>
            <input type = "text" class = "text"
                   size = "35" name = "lastname_kana" maxlength = "10" pattern = "[\uFF66-\uFF9D\uFF0D]+$">
        </div>
        
        <div>
            <label>メールアドレス</label>
            <input type = "text" class = "text"
                   size = "35" name = "mail" maxlength = "100" pattern = "^[a-zA-Z0-9-@]+$">   
        </div>
        
        <div>
            <label>パスワード</label>
            <input type = "text" class = "text"
                   size = "35" name = "password" maxlength = "10" pattern = "[a-zA-Z0-9]+$">
        </div>
        
        <div>
            <label>性別</label>
            <input type = "radio" name = "gender" value = "XXX">男
            <input type = "radio" name = "gender" value = "XXX">女
        </div>
        
        <div>
            <label>郵便番号</label>
            <input type = "text" class = "text"
                   size = "35" name = "postal_code" maxlength = "7" pattern="^[0-9]+$">
        </div>
        
        <div>
            <label>住所（都道府県）</label>
            <select name="prefectures">
                <option value="" selected></option>
                <option value="1">北海道</option>
                <option value="2">青森県</option>
                <option value="3">岩手県</option>
                <option value="4">宮城県</option>
                <option value="5">秋田県</option>
                <option value="6">山形県</option>
                <option value="7">福島県</option>
                <option value="8">茨城県</option>
                <option value="9">栃木県</option>
                <option value="10">群馬県</option>
                <option value="11">埼玉県</option>
                <option value="12">千葉県</option>
                <option value="13">東京都</option>
                <option value="14">神奈川県</option>
                <option value="15">新潟県</option>
                <option value="16">富山県</option>
                <option value="17">石川県</option>
                <option value="18">福井県</option>
                <option value="19">山梨県</option>
                <option value="20">長野県</option>
                <option value="21">岐阜県</option>
                <option value="22">静岡県</option>
                <option value="23">愛知県</option>
                <option value="24">三重県</option>
                <option value="25">滋賀県</option>
                <option value="26">京都府</option>
                <option value="27">大阪府</option>
                <option value="28">兵庫県</option>
                <option value="29">奈良県</option>
                <option value="30">和歌山県</option>
                <option value="31">鳥取県</option>
                <option value="32">島根県</option>
                <option value="33">岡山県</option>
                <option value="34">広島県</option>
                <option value="35">山口県</option>
                <option value="36">徳島県</option>
                <option value="37">香川県</option>
                <option value="38">愛媛県</option>
                <option value="39">高知県</option>
                <option value="40">福岡県</option>
                <option value="41">佐賀県</option>
                <option value="42">長崎県</option>
                <option value="43">熊本県</option>
                <option value="44">大分県</option>
                <option value="45">宮崎県</option>
                <option value="46">鹿児島県</option>
                <option value="47">沖縄県</option>
            </select>
        </div>
        
        <div>
            <label>住所（市区町村）</label>
            <input type = "text" class = "text"
                   size = "35" name = "address_1" maxlength = "10" pattern="[-\u4E00-\u9FFF\u3040-\u309Fー\uFF66-\uFF9F\u30A1-\u30F60-9０-９_\s]*">
        </div>
        
        <div>
            <label>住所（番地）</label>
            <input type = "text" class = "text"
                   size = "35" name = "address_2" maxlength = "100" pattern = "[-\u4E00-\u9FFF\u3040-\u309Fー\uFF66-\uFF9F\u30A1-\u30F60-9０-９_\s]*">
        </div>
        
        <div>
            <label>アカウント権限</label>
            <select name = "authority">
                <option value = "1">一般</option>
                <option value = "2">管理者</option>
            </select>
        </div> 
        
        <div>
            <input type = "submit" class = "submit" value = "確認">
        </div>
        
    </form>
        
        <footer></footer>
    
    </body>
</html>