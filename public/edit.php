<?php
session_start();

require_once __DIR__ . '/../config/database.php';

$db = Database::getConnection();

$id = trim($_POST['id'] ?? '');
$titulo = trim($_POST['titulo'] ?? '');
$status = trim($_POST['status'] ?? '');

if (empty($titulo)) {
  $_SESSION['erro_modal'] = "O título não pode ficar vazio!";
} elseif (preg_match('/\d/', $titulo)) {
  $_SESSION['erro_modal'] = "O título não pode conter números!";
} else {
  $db = Database::getConnection();
  $sql = "UPDATE tarefas SET titulo = :titulo, status = :status WHERE id = :id";
  $stmt = $db->prepare($sql);

  $stmt->execute([
    ':titulo' => $titulo,
    ':status' => 'pendente',
    ':id' => $id
  ]);
}

header('Location: index.php');
exit;
