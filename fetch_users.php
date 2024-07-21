<?php

require 'db.php';

$stmt = $db->query("SELECT id, name, email, created_at FROM users");
$users = $stmt->fetchAll();

echo json_encode($users);
?>