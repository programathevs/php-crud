# Guia de Contribuição

Agradecemos pelo interesse em contribuir com o **PHP Tasks CRUD**! Para manter a organização e a qualidade do projeto, siga as orientações abaixo.

---

## 🔀 Fluxo de Trabalho (Branch + PR)

1. **Crie uma branch para sua alteração:**
   - Para novas funcionalidades:
     ```bash
     git checkout -b feat/nome-da-feature
     ```
   - Para correções de bugs:
     ```bash
     git checkout -b fix/descricao-do-bug
     ```
   - Para documentação ou manutenção:
     ```bash
     git checkout -b docs/nome-da-alteracao
     # ou
     git checkout -b chore/nome-da-tarefa
     ```

2. **Faça as modificações e teste localmente.**

3. **Envie a branch para o repositório remoto:**
   ```bash
   git push origin feat/nome-da-feature
   ```

4. **Abra um Pull Request (PR):**
   - Aponte para a branch principal (`main`).
   - Preencha o template de PR detalhando o que foi alterado e como testar.

---

## 📝 Padrão de Commits (Conventional Commits)

Utilizamos o padrão [Conventional Commits](https://www.conventionalcommits.org/) para manter o histórico de alterações claro e padronizado:

Formato básico:
```
<tipo>(<escopo opcional>): <descrição em minúsculas e no imperativo>
```

### Tipos mais comuns:
- `feat`: Adiciona uma nova funcionalidade ao projeto.
- `fix`: Corrige um bug ou comportamento inesperado.
- `docs`: Alterações exclusivamente na documentação.
- `style`: Ajustes visuais ou formatação de código que não afetam a lógica.
- `refactor`: Refatoração de código que não adiciona recurso nem corrige bug.
- `perf`: Mudança de código que melhora a performance.
- `chore`: Tarefas de manutenção, atualização de dependências ou configurações.

**Exemplos:**
```bash
git commit -m "feat(tasks): adiciona filtro de tarefas por status"
git commit -m "fix(database): trata exceção de conexão com timeout"
git commit -m "docs: atualiza instruções de instalação no README"
```

---

## 🧪 Validação antes de abrir PR

Como o projeto ainda não possui suíte de testes automatizados, antes de submeter seu Pull Request:

1. **Valide a sintaxe PHP** de todos os arquivos modificados:
   ```bash
   php -l public/index.php
   ```
2. **Execute a aplicação localmente** e teste manualmente os fluxos de CRUD (criar, listar, editar e excluir tarefas).
3. **Verifique se não há mensagens de erro** ou warnings no log do PHP e no console do navegador.
