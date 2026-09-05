const modal = document.getElementById("taskModal");
const form = document.getElementById("taskForm");
const modalTitle = document.getElementById("modalTitle");
const taskId = document.getElementById("taskId");
const taskTitulo = document.getElementById("titulo");
const taskStatus = document.getElementById("status");
const formAction = document.getElementById("formAction");
const mensagemErro = document.getElementById("mensagem-erro");

if (mensagemErro) {
  mensagemErro.style.transition = "opacity 0.5s ease"; // Adicione a transição

  setTimeout(() => {
    mensagemErro.style.opacity = "0";

    // Remove do DOM logo após a animação de 0.5s terminar
    setTimeout(() => {
      mensagemErro.remove();
    }, 500);
  }, 3000);
}

// Modo Edição
function openEditModal(button) {
  form.reset();

  // Resgata os dados dos atributos data-*
  const id = button.getAttribute("data-id");
  const titulo = button.getAttribute("data-titulo");
  const status = button.getAttribute("data-status");

  taskId.value = id;
  taskTitulo.value = titulo;
  taskStatus.value = status;
  formAction.value = "editar";
  modalTitle.textContent = `Editar Tarefa #${id}`;

  modal.showModal();
}

function closeModal() {
  modal.close();
}

// Fecha ao clicar fora da caixa do modal
modal.addEventListener("click", (e) => {
  const dialogDimensions = modal.getBoundingClientRect();
  if (
    e.clientX < dialogDimensions.left ||
    e.clientX > dialogDimensions.right ||
    e.clientY < dialogDimensions.top ||
    e.clientY > dialogDimensions.bottom
  ) {
    modal.close();
  }
});
