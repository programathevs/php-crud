<?php
$titulo = 'Lista de Tarefas';
require __DIR__ . '/../partials/header.php';
?>

<form>
  <label for="title">Título:</label>
  <input type="text" id="title" name="title" required>

  <label for="description">Descrição:</label>
  <textarea id="description" name="description"></textarea>

  <button type="submit">Salvar Tarefa</button>
</form>

<?php
require __DIR__ . '/../partials/footer.php';
?>
