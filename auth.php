<?php
require 'db.php';


if (!empty($_POST)) {

    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT id, name, email, password FROM users WHERE name = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$name]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        print_r($user);
        setcookie(
            'access',
            'yes',
            time() + 86400,  // через 1 день исчезнет 
            '/'
        );
        echo("<script>window.location.replace('./');</script>");
    } else {
        echo "Неверное имя пользователя или пароль.";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepuim</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div class='container mt-5'>

    <h2>Вход</h2>
        <form method="post">
            <input type="text" name="name" class="form-control" placeholder='Name' required><br>
            <input type="password" name="password" class="form-control" placeholder='Password' required><br>
            <input type="submit" class="form-control btn btn-primary" value="Войти">

        </form>



    </div>
    
</body>
</html>