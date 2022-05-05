<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="output.php" method="post">
        店名:<input type="text" name="shop_name" required>
        <hr>
        営業時間:
            <?php
            for ($i=1; $i <=4 ; $i++) { 
                $time = "_time_";
                if($i <= 2){
                    $time = "open" . $time;
                }elseif($i >= 3){
                    $time = "close" . $time;
                }
                if ($i == 1 || $i == 3) {
                    $time .="h";
                    print('<select name = "' . $time .'">');
                    for ($j=0; $j <=23 ; $j++) { 
                        print('<option value = "' . $j . '">' . $j .'</option>');
                    }
                }elseif ($i == 2 || $i == 4){
                    $time .="m";
                print('：<select name = "' . $time .'">');
                for ($j=0; $j <=59 ; $j++) { 
                    print('<option value = "' . $j . '">' . $j .'</option>');
                }
                }
                print('</select>');
                if($i == 2){
                    print("〜");
                }
            }
            ?>
        <hr>
        電話番号:<input type = "text" name = tel>
        <hr>
        詳細情報:
        <textarea name="info" rows ="5" wrap = "hard" >
        </textarea>
        <hr>
        <input type="submit" value="登録する">
    </form>
</body>
</html>