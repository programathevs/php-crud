# PHP Tasks CRUD

Aplicação web em PHP puro e MySQL para gerenciamento de tarefas, fornecendo operações completas de CRUD (criação, listagem, edição e exclusão) com interface moderna e responsiva.

## 🚀 Como Instalar e Rodar

### Pré-requisitos
- PHP 8.0 ou superior
- Composer
- Banco de dados MySQL

### Passo a passo
1. **Clone o repositório:**
   ```bash
   git clone https://github.com/programathevs/php-crud.git
   cd php-crud
   ```

2. **Instale as dependências:**
   ```bash
   composer install
   ```

3. **Configure as variáveis de ambiente:**
   Copie o arquivo de exemplo e preencha com as credenciais do seu banco de dados:
   ```bash
   cp .env.example .env
   ```

4. **Inicie o servidor embutido do PHP:**
   ```bash
   php -S localhost:8000 -t public
   ```
   Acesse no navegador: `http://localhost:8000`

## 🧪 Testes

Atualmente o projeto não conta com uma suíte de testes automatizados configurada. Antes de submeter alterações, valide a sintaxe dos arquivos PHP com:

```bash
php -l caminho/do/arquivo.php
```

E certifique-se de testar os fluxos da aplicação manualmente no navegador.

## 🤝 Como Contribuir

Contribuições são sempre bem-vindas! Consulte o arquivo [CONTRIBUTING.md](CONTRIBUTING.md) para detalhes sobre nosso fluxo de trabalho, branches e padrão de commits.

## 📄 Licença

Distribuído sob a licença MIT. Consulte o arquivo [LICENSE](LICENSE) para obter mais informações.
