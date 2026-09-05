<?php
session_start();

require_once __DIR__ . '/../config/database.php';

$db = Database::getConnection();
$titulo = trim($_POST['titulo'] ?? '');

if (empty($titulo)) {
  $_SESSION['erro'] = "O título não pode ficar vazio!";
} elseif (preg_match('/\d/', $titulo)) {
  $_SESSION['erro'] = "O título não pode conter números!";
} else {
  $db = Database::getConnection();
  $sql = "INSERT INTO tarefas (titulo, status) VALUES (:titulo, :status)";
  $stmt = $db->prepare($sql);

  $stmt->execute([
    ':titulo' => $titulo,
    ':status' => 'pendente'
  ]);
}

// O redirecionamento agora funciona perfeitamente
header('Location: index.php');
exit;
