<?php
$titulo = 'Lista de Tarefas';
require __DIR__ . '/../partials/header.php';
?>

<main class="container">
    <div class="header">
        <h1>Minha Lista de Tarefas</h1>
        <p>Aplicação simples de treino de CRUD em PHP puro.</p>
    </div>

    <section class="card-create-task">
        <h2 class="card-title"><span>+</span> ADICIONAR NOVA TAREFA</h2>
        <form action="salvar.php" method="POST" class="task-form">
            <input type="hidden" name="acao" value="adicionar">

            <div class="form-group">
                <input
                    type="text"
                    name="titulo"
                    class="input-task"
                    placeholder="Digite a nova tarefa..."
                    required>
                <button type="submit" class="btn-add">
                    + Adicionar
                </button>
            </div>

        </form>

        <p>Pressione Enter para adicionar a tarefa</p>
    </section>

    <section class="task-list-section">
        <div class="list-header">
            <h2 class="list-title">TAREFAS CADASTRADAS</h2>
            <span class="task-counter">Total: <strong>4</strong> tarefas</span>
        </div>

        <div class="table-responsive">
            <table class="task-table">
                <thead>
                    <tr>
                        <th class="col-id">ID</th>
                        <th class="col-task">Tarefa</th>
                        <th class="col-status">Status</th>
                        <th class="col-actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= htmlspecialchars($task['id'] ?? '') ?></td>
                            <td><?= htmlspecialchars($task['titulo'] ?? $task['nome'] ?? $task['descricao'] ?? '') ?></td>
                            <td><?= htmlspecialchars($task['status'] ?? 'Pendente') ?></td>
                            <td>
                                <a href="/tasks/edit.php?id=<?= htmlspecialchars($task['id'] ?? '') ?>">Editar</a>
                                <a href="/tasks/delete.php?id=<?= htmlspecialchars($task['id'] ?? '') ?>" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </section>
</main>

<?php
require __DIR__ . '/../partials/footer.php';
?>
