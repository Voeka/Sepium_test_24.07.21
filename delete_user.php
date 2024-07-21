<?php
// delete_user.php
require 'db.php';

$id = $_POST['id'];

$sql = "DELETE FROM users WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);

echo json_encode(['id' => $id]);
?>