# Organizer

*Sistema completo para gerenciamento de ONGs, facilitando a administração de projetos, doadores, notícias e campanhas.*


## Índice

* [Descrição](#descrição)
* [Funcionalidades](#funcionalidades)
* [Tecnologias Utilizadas](#tecnologias-utilizadas)
* [Como Rodar o Projeto](#como-rodar-o-projeto)
* [Estrutura do Projeto](#estrutura-do-projeto)
* [Licença](#licença)

---

## Descrição

O **Organizer** é um sistema web desenvolvido para facilitar o gerenciamento de ONGs. O sistema permite que usuários se cadastrem livremente como **doador**, **ONG** ou **administrador** (quando autorizado). Com isso, o Organizer oferece controle e transparência na gestão de projetos sociais, notícias e doações.

---

## Funcionalidades

* Cadastro e login de usuários com perfis diferenciados:

  * **Doador:** pode se cadastrar, visualizar projetos e fazer doações.
  * **ONG:** pode se cadastrar, criar e gerenciar seus próprios projetos e notícias.
  * **Administrador:** possui controle total sobre o sistema, incluindo gestão de usuários e conteúdos.

* Gerenciamento completo de projetos sociais: criação, edição, exclusão e visualização detalhada.

* Publicação e gerenciamento de notícias para manter a comunidade informada.

* Sistema de favoritos para projetos.

* Interface responsiva e intuitiva.

* Controle de permissões baseado na sessão do usuário.

---

## Tecnologias Utilizadas

* PHP (arquitetura MVC)
* MySQL (banco de dados)
* HTML5 / CSS3 / JavaScript
* PDO para conexões seguras ao banco
* Font Awesome para ícones

---

## Como Rodar o Projeto

Este é um projeto PHP que utiliza PHPMailer para envio de e-mails, e Symfony Dotenv para gerenciamento seguro de variáveis de ambiente. O gerenciamento de dependências é feito com o Composer local (composer.phar).

### 🚀 Requisitos
* PHP 8.1 ou superior
* Composer local (composer.phar na raiz do projeto)

### ⚙️ Instalar as dependências

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/organizer.git
   ```

2. Instale as dependências:
   ```bash
   php composer.phar install
   ```

3. Crie um arquivo .env para colocar suas variáveis de ambiente, como o exemplo em .env.example

4. Configure o banco de dados MySQL:
   * Crie o banco `organizer` (ou o nome que preferir).
   * Importe o arquivo SQL com a estrutura inicial.

5. Ajuste as configurações de conexão no arquivo `database.php`.

6. Hospede o projeto em um servidor local (XAMPP, WAMP, etc.).

7. Acesse via navegador:
   ```
   http://localhost/organizer
   ```

---

## Estrutura do Projeto

```
organizer/
│
├── config/              # Configurações do sistema (ex: banco de dados)
├── controller/          # Controladores que gerenciam a lógica da aplicação
├── database/                  # Scripts e arquivos relacionados ao banco de dados
├── model/               # Modelos que representam dados e regras de negócio
├── view/                # Arquivos da interface do usuário
│   ├── assets/          # Arquivos estáticos (CSS, JS, imagens) organizados por perfil e componentes
│   ├── components/      # Componentes reutilizáveis da interface (cards, layouts, popups)
│   └── pages/           # Páginas específicas para cada perfil de usuário (adm, doador, ong, visitante)
└── README.md            # Documentação do projeto
```

---

---

## Licença

Senac Hub Academy 2025.

---
