<?php

require 'db.php';

$id = $_GET['id'];
$sql = "SELECT id, name, email FROM users WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$user = $stmt->fetch();

echo json_encode($user);
?>
