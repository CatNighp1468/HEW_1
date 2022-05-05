<?php 
    $to = $_POST['user_mail'];

try {
    $db = new PDO('mysql:dbname=hew_db;host=localhost;charset=utf8','root','root');
    print ("ご入力していただいたメールアドレスに、IDとパスワードを送信しました。\n");
    print ("ご確認の上、Loginページの方でログインしてください。");
} catch(PDOException $e){
    //print("エラー:お手数ですが入力し直してください。");
    //print('<orm action="pega_1.php" method="post"><input type="submit" value="戻る">');
}

$words = mt_rand(8 ,16);
$pass_key = "";
for ($i=0; $i < $words ; $i++) {
    $key_number = mt_rand(0 ,2);
    if ($key_number == 0) {
        $key = mt_rand(0 ,9);
    }elseif ($key_number == 1) {
        $key = chr(mt_rand(65 ,90));
    }elseif ($key_number == 2) {
        $key = chr(mt_rand(97 ,122));
    }
    $pass_key .=$key;
}

$make_id = $db -> exec('INSERT INTO user SET pass ="' . $pass_key . '"');
$id = $db -> query('SELECT id FROM user WHERE id=(SELECT MAX(id) FROM user)');
$user_id = $id->fetch();

$subject = "【Review Station(HEW作品)】アカウントIDとパスワード";

$text = "この度は、Review Stationのご利用ありがとうございます。\n\n";
$text .= "【ID】" . $user_id['id'] . "\n";
$text .= "【password】" . $pass_key . "\n";
$text .= "\n";
$text .= "本サイト(Review Station)は、個人制作のHEW作品になります。\n";
$text .= "今回、個人情報を扱うことを極力避けるため、メールアドレスにて【ID】と【パスワード】を送信する形をとっております。\n";
$text .= "ご登録の際に入力していただいたメールアドレスは、本サイトには保存されていませんのでパスワードを忘れた等の対応はできません。\n";
$text .= "ご了承ください。\n";

$header = "MIME-Version: 1.0\n";
$header .= "From: Review Station <review_station@catnighp.com>\n";
$header .= "Reply-To: Review Station <review_station@catnighp.com>\n";

mb_language("Japanese");
mb_internal_encoding("UTF-8");
mb_send_mail( $to, $subject, $text, $header);

?>