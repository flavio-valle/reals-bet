# 🚀 Documentação do Projeto Laravel - Reals Bet

## 🛠 Pré-requisitos

Certifique-se de que sua máquina atenda aos seguintes requisitos antes de começar:

- **PHP**: Versão 8.2 ou superior.
- **Composer**: Ferramenta para gerenciar dependências PHP.
- **Docker** e **Docker Compose**: Necessários para rodar o ambiente do Laravel Sail.
- **Node.js**: Versão 16+ para gerenciar pacotes do frontend.

---

## 📦 Configuração do Projeto

1. **Clone o repositório:**
   ```bash
   git clone <URL_DO_REPOSITORIO>
   cd <NOME_DO_REPOSITORIO>
   ```

2. **Instale as dependências do PHP:**
   ```bash
   composer install
   ```

3. **Configure as variáveis de ambiente:**
   ```bash
   cp .env.example .env
   ```

4. **Suba os contêineres com Docker:**
   ```bash
   ./vendor/bin/sail up -d
   ```

5. **Instale as dependências do Node.js:**
   ```bash
   ./vendor/bin/sail npm install
   ```

6. **Compile os assets do frontend:**
   ```bash
   ./vendor/bin/sail npm run dev
   ```

## 📖 Estrutura do Projeto

### **composer.json**
O arquivo `composer.json` define as dependências principais e de desenvolvimento, incluindo:
- **Dependências principais**:
  - `inertiajs/inertia-laravel`: Integração do Inertia.js.
  - `laravel/jetstream`: Sistema de autenticação.
  - `laravel/sanctum`: Gerenciamento de tokens.
  - `tightenco/ziggy`: Rotas no frontend.
- **Dependências de desenvolvimento**:
  - `laravel/sail`: Ambiente de desenvolvimento Docker.
  - `laravel/pint`: Ferramenta de linting para Laravel.
  - `lucascudo/laravel-pt-br-localization`: Tradução para português brasileiro.

### **package.json**
O arquivo `package.json` contém as dependências JavaScript e scripts para desenvolvimento:
- **Dependências principais**:
  - `vue`: Framework frontend.
  - `vite`: Gerenciador de build rápido.
  - `tailwindcss`: Framework CSS utilitário.
  - `@inertiajs/vue3`: Integração Vue com Inertia.js.
- **Scripts disponíveis**:
  - `build`: Gera a build otimizada para produção.
  - `dev`: Inicia o ambiente de desenvolvimento com Vite.

## 🛠 Scripts Úteis

- **Subir os contêineres Docker**:
  ```bash
  ./vendor/bin/sail up -d
  ```

- **Parar os contêineres Docker**:
  ```bash
  ./vendor/bin/sail down
  ```

- **Executar migrations**:
  ```bash
  ./vendor/bin/sail artisan migrate
  ```

- **Rodar o ambiente local completo (Backend + Frontend + Fila)**:
  ```bash
  composer run dev
  ```

## 📂 Estrutura de Diretórios

- `app/`: Contém os arquivos principais do backend Laravel.
- `resources/js/`: Arquivos JavaScript do frontend (Vue.js, Inertia.js).
- `resources/css/`: Estilos do frontend (Tailwind CSS).
- `database/`: Migrations e seeders para configuração do banco de dados.

## 🧪 Testes

- **Executar os testes PHP**:
  ```bash
  ./vendor/bin/sail test
  ```

- **Executar linting com Laravel Pint**:
  ```bash
  ./vendor/bin/sail pint
  ```

## 🌟 Funcionalidades

- **Autenticação com Jetstream**: Login, registro e recuperação de senha.
- **Integração Vue.js com Inertia.js**: Navegação fluida e moderna.

Para mais informações, consulte a documentação oficial do Laravel ou entre em contato com o time de desenvolvimento.
