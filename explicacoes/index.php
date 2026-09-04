<?php

// Obtém uma conexão com o banco de dados.
//
// O método getConnection() pertence à classe Database.
// Como ele é "static", podemos chamá-lo diretamente pela classe:
//
// Database::getConnection()
//
// A conexão PDO retornada é armazenada na variável $db.
$db = Database::getConnection();


// Executa uma consulta SQL no banco de dados.
//
// query() é um método do PDO usado para executar uma consulta
// SQL que não precisa receber valores externos.
//
// Neste caso, estamos buscando todas as colunas (*)
// da tabela "users".
//
// O resultado da consulta é armazenado na variável $stmt.
//
// $stmt significa "statement" (declaração/comando SQL).
$stmt = $db->query("SELECT * FROM tarefas");


// Obtém todos os registros retornados pela consulta.
//
// fetchAll() pega todas as linhas do resultado.
//
// PDO::FETCH_ASSOC determina que cada usuário será retornado
// como um array associativo.
//
// Exemplo de resultado:
//
// [
//     [
//         'id' => 1,
//         'name' => 'João',
//         'email' => 'joao@email.com'
//     ],
//     [
//         'id' => 2,
//         'name' => 'Maria',
//         'email' => 'maria@email.com'
//     ]
// ]
//
// O resultado final é armazenado na variável $users.
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Fecha a tag PHP.
?>
