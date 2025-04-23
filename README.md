
# Laravel Solid 

Este projeto demonstra uma estrutura de aplicação Laravel com foco em princípios SOLID e arquitetura limpa, ideal para aplicações escaláveis, manuteníveis e bem organizadas.

## 📦 Tecnologias

- PHP 8.x
- Laravel 10.x
- MySQL / PostgreSQL
- Composer

## 🧠 Conceitos Aplicados

- Princípios SOLID
- Repository Pattern
- Service Layer
- Dependency Injection
- Interfaces para abstração

## 📁 Estrutura

```
app/
├── Http/
│   ├── Controllers/
│   └── Requests/
├── Models/
├── Repositories/
│   ├── Contracts/
│   └── Implementações
├── Services/
│   └── Lógica de negócios
```

## 🚀 Instalação

1. Clone o projeto:

```bash
git clone https://github.com/gregoricfranco/laravel-solid-app.git
cd laravel-solid-app
```

2. Instale as dependências:

```bash
composer install
```

3. Copie e configure o `.env`:

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure o banco de dados no `.env` e rode as migrations:

```bash
php artisan migrate
```

5. Rode a aplicação:

```bash
php artisan serve
```

## 🧪 Testes

```bash
php artisan test
```

## 📌 Exemplos

- `app/Repositories/ImoveisRepository.php`: Exemplo de implementação de repositório usando interface e injeção de dependência.
- `app/Services/ImoveisService.php`: Onde está encapsulada a lógica de negócio referente a imóveis.

## 🤝 Contribuições

Sinta-se à vontade para abrir issues ou pull requests com sugestões, melhorias ou correções. Toda contribuição é bem-vinda!

## 📄 Licença

Este projeto está sob a licença MIT.
