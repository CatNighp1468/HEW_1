<?php
    session_start();
    if(empty($_SESSION['id'])){
    }else{
    $user_login = $_SESSION['id'];
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>トップページ</title>
</head>
<body>
    <div class = "login">
        <?php
            if(isset($_SESSION['id'])){
                $message = "ID:" . htmlspecialchars($user_login, \ENT_QUOTES, 'UTF-8') . 'さん';
                $my_pega = '<a href =users_system/my_pega.php>';
            } else {
                $message = 'Login';
                $my_pega = '<a href = users_system/login.php>';
            }
        ?>
    <?php 
    print ('<h3>' .$log_link . $log . '</a></h3>');
    print ($my_pega . $message . '</a>'); 
    ?></h1>
    </div>
    <hr>
    <header>
        <h1><a href="index.php">Review Station</a></h1>
        <h2><a href="index.php">by Shinjuku</a></h2>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Top</a></li>
            <li><a href="new_pega_system/input.php">make</a></li>
            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLScbtBqVqt-YlrldoB5czAFgKP17lsxhS8OW-HVnh0uvJKoZQg/viewform?embedded=true"">Help</a></li>
            <hr>
        </ul>
    </nav>
    <div class= "re_spot">
        <p>新規追加順</p>
        <ul class ="spot_list">
            <li class = "item"><img src="images/kari_number_0.png" alt="仮番号"></li>
            <li class = "item"><img src="images/kari_number_1.png" alt="仮番号"></li>
            <li class = "item"><img src="images/kari_number_2.png" alt="仮番号"></li>
            <li class = "item"><img src="images/kari_number_3.png" alt="仮番号"></li>
            <li class = "item"><img src="images/kari_number_4.png" alt="仮番号"></li>
        </ul>
        <br><br><br><br><br>
    </div>
        <hr>
        <center>
        <small>Copyright&copy; 2022 Yusuke Sato</small>
        </center>
    </footer>
</body>
</html>