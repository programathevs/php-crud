<?php

require_once __DIR__ . '/../config/database.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
  $db = Database::getConnection();

  $stmt = $db->prepare("DELETE FROM tarefas WHERE id = :id");
  $stmt->execute([':id' => $id]);
}

header('Location: index.php');
exit;
