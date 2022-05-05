<?php
session_start();
$_SESSION = array();//セッションの中身をすべて削除
session_destroy();//セッションを破壊
?>

<p>ログアウトしました。</p>
<?php
    header("refresh:5;url=../index.php");
    print("5秒後にトップページへ移動します。\n");
    print('移動しない場合は<a href="../index.php">こちら</a>からトップページへ移動してください。');
?>