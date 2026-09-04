<?php
$titulo = 'Lista de Tarefas';
require __DIR__ . '/../partials/header.php';
?>

<main>
    <h1>Minhas Tarefas</h1>

    <?php if (!empty($tasks)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título / Descrição</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <!-- Ajuste os nomes das chaves conforme as colunas do seu banco -->
                        <td><?= htmlspecialchars($task['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($task['titulo'] ?? $task['nome'] ?? $task['descricao'] ?? '') ?></td>
                        <td><?= htmlspecialchars($task['status'] ?? 'Pendente') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="empty-msg">Nenhuma tarefa encontrada.</p>
    <?php endif; ?>
</main>

<?php
require __DIR__ . '/../partials/footer.php';
?>
