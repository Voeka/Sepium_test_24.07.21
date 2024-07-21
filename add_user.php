<?php

require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->execute([$name, $email, $password]);

echo json_encode(['id' => $db->lastInsertId(), 'name' => $name, 'email' => $email, 'created_at' => date('Y-m-d H:i:s')]);
?>