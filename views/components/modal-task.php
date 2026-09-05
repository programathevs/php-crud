  <dialog id="taskModal" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 id="modalTitle">Criar Nova Tarefa</h3>
        <button type="button" class="btn-close" onclick="closeModal()">&times;</button>
      </div>

      <form action="edit.php" method="POST" id="taskForm">
        <input type="hidden" name="id" id="taskId" value="">
        <input type="hidden" name="acao" id="formAction" value="adicionar">

        <div class="form-field">
          <label for="titulo">Título da Tarefa</label>
          <input
            type="text"
            id="titulo"
            name="titulo"
            required>
        </div>

        <?php if (isset($_SESSION['erro_modal'])): ?>

          <p style="color: red; margin-bottom: 10px;" id="mensagem-erro">
            <?= $_SESSION['erro_modal'] ?>
          </p>

        <?php endif; ?>

        <div class="form-field">
          <label for="status">Status</label>
          <select id="status" name="status" required>
            <option value="pendente">Pendente</option>
            <option value="finalizada">Finalizada</option>
          </select>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn-cancel" onclick="closeModal()">Cancelar</button>
          <button type="submit" class="btn-save">Salvar</button>
        </div>
      </form>
    </div>
  </dialog>

  <?php if (isset($_SESSION['erro_modal'])): ?> <script>
      document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('taskModal').showModal();
      });
    </script> ]
    <?php unset($_SESSION['erro_modal']); ?>
  <?php endif; ?>
