<?php

require_once __DIR__ . '/../config/database.php';

$db = Database::getConnection();

$stmt = $db->query("SELECT * FROM tarefas");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../views/tasks/index.php';
