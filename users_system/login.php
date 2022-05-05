<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class = "login">
        Login pega
        <form action="login_check.php" method="post">
        ID: <input type="text" name = "id" required>
        <br>
        Password: <input type="password" name = "pass" required>
        <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>