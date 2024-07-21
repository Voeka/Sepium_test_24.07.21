<?php
require("db.php");

$users = $db->query("SELECT * FROM users")->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    print_r($users);
    
    ?>
    <!-- Первый тест на работу с бд, не обращайте внимания) -->
</body>
</html>