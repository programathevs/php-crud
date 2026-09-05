<?php
session_start();
$titulo = 'Lista de Tarefas';
require __DIR__ . '/../partials/header.php';
?>

<main class="container">
    <section class="card-create-task">
        <h2 class="card-title"><span>+</span> ADICIONAR NOVA TAREFA</h2>
        <form action="create.php" method="POST" class="task-form">
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
        <?php
        if (isset($_SESSION['erro'])): ?>
            <p style="color: red; margin-bottom: 10px;" id="mensagem-erro">
                <?= htmlspecialchars($_SESSION['erro'], ENT_QUOTES, 'UTF-8') ?>
            </p>
        <?php endif; ?>
        <p>Pressione Enter para adicionar a tarefa</p>
    </section>

    <section class=" task-list-section">
        <div class="list-header">
            <h2 class="list-title">TAREFAS CADASTRADAS</h2>
            <span class="task-counter">Total: <strong>4</strong> tarefas</span>
        </div>

        <div class="table-container">
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
                        <?php
                        $id = $task['id'] ?? '';
                        $tituloTarefa = $task['titulo'] ?? $task['nome'] ?? $task['descricao'] ?? '';
                        $statusRaw = strtolower($task['status'] ?? 'pendente');

                        // Verifica se está concluída ou finalizada
                        $isDone = in_array($statusRaw, ['finalizada', 'concluida']);

                        // Classes dinâmicas
                        $taskClass = $isDone ? 'task-done' : '';
                        $badgeClass = $isDone ? 'badge-done' : 'badge-pending';
                        $statusLabel = $isDone ? 'Concluída' : 'Pendente';
                        ?>
                        <tr>
                            <td class="col-id">#<?= htmlspecialchars($task['id'] ?? '') ?></td>
                            <td class="col-task <?= $taskClass ?>">
                                <?= htmlspecialchars($tituloTarefa) ?>
                            </td>

                            <td class="col-status status">
                                <span class="badge <?= $badgeClass ?>">
                                    <?= htmlspecialchars($statusLabel) ?>
                                </span>
                            </td>

                            <td class="col-actions">
                                <button onclick="openEditModal(this)" class="btn-action btn-edit"
                                    data-id="<?= htmlspecialchars($task['id'] ?? '') ?>"
                                    data-titulo="<?= htmlspecialchars($task['titulo'] ?? '') ?>"
                                    data-status="<?= htmlspecialchars(strtolower($task['status'] ?? '')) ?>">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                    </svg>
                                    Editar
                                </button>
                                <a href="delete.php?id=<?= urlencode($task['id'] ?? '') ?>"
                                    onclick="return confirm('Deseja realmente excluir esta tarefa?');"
                                    class="btn-action btn-delete">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php
require __DIR__ . '/../components/modal-task.php';
require __DIR__ . '/../partials/footer.php';
?>
