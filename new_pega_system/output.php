<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href=""></a>
    <?php
    $shop_name = $_POST['shop_name'];
    $time = $_POST['open_time_h'] .":". $_POST['open_time_m'] ."~". $_POST['close_time_h'] .":". $_POST['close_time_h'];
    $tel = $_POST['tel'];
    $info = $_POST['info'];
        try {
            $db = new PDO('********');
            $contents = $db -> exec('INSERT INTO shop SET shop_name ="' . $shop_name . '", time = "'. $time. '", tel = "' .$tel. '", info ="' . $info . '"');
            $pegas= $db -> query('SELECT id, shop_name, info FROM shop WHERE id=(SELECT MAX(id) FROM shop)');
            $pega = $pegas->fetch();
            $folder = "../shop/pega_" . $pega['id'];
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            $file = "<?php $" . "id = " . $pega['id'] . "; ?>\n";
            $file .= file_get_contents('template.php');
            file_put_contents("../shop/pega_" . $pega['id'] ."/pega_" . $pega['id'] . ".php" , $file); 
            print("<p>ページ作成が完了しました。3秒後に作成したページに自動的に移動します。</p>");
            header("refresh:3;url=../shop/pega_" . $pega['id'] ."/pega_" . $pega['id'] . ".php");
        }catch(PDOException $e){
            print("エラー:お手数ですが入力し直してください。");
            print('<orm action="pega_1.php" method="post"><input type="submit" value="戻る">');
        }
    ?>
</body>
</html>
