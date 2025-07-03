# Backend-viacep

## Funcionalidades principais

- 📡 API RESTful organizada
- 🧪 Testes automatizados para rotas
- 📘 Documentação interativa via Swagger

## Estrutura

O projeto segue o padrão:

- Controllers em `app/Http/Controllers`
- Rotas definidas em `routes/api.php`
- Testes localizados em `tests/Feature`
- Documentação Swagger em `/api/documentation`


## 🧪 Rodando os testes de rota

(http://localhost:8000/api/documentation)

### ▶️ Comando para rodar os testes e gerar 0 Swagger:

```bash
php artisan l5-swagger:generate

php artisan test