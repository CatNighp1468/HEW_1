<?php
session_start();
$id = $_POST['id'];

try {
    $db = new PDO('mysql:dbname=7s7lp_hew_1_db;host=mysql44.onamae.ne.jp;charset=utf8','7s7lp_catnighp_1468','1201Sato@1468');
} catch(PDOException $e){
    print("エラー:お手数ですが入力し直してください。");
    print('<orm action="pega_1.php" method="post"><input type="submit" value="戻る">');
}

$sql = "SELECT * FROM user WHERE id = :id";
$user_list = $db ->prepare($sql);
$user_list -> bindValue(':id' , $id);
$user_list -> execute();
$user = $user_list -> fetch();

if ($_POST['pass'] == $user['pass']) {
    $_SESSION['id'] = $user['id'];
    print("ログインが完了しました。\n");
    header("refresh:5;url=../index.php");
    print("5秒後にトップページへ移動します。\n");
    print('移動しない場合は<a href="../index.php">こちら</a>からトップページへ移動してください。');

}else {
    print("IDもしくはパスワードが間違っています。");
   print('<a href="login.php">戻る</a>');
}



?>