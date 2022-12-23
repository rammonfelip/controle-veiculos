## Controle de Veículos

### Tecnologias utilizadas
- [Laravel 9](https://laravel.com/docs/9.x)
- [PHP 8.1](https://www.php.net/manual/pt_BR/index.php)
- [Docker](https://docs.docker.com/get-docker/)

### Passo a Passo

Clone o repositório
```sh
git clone https://github.com/rammonfelip/controle-veiculos.git
```
Faça uma cópia do arquivo .env.example
```sh
cp .env.example .env
```
Rode o comando para subir os containers
```sh
docker-compose up -d
```

Feito isso a aplicação já está disponível, mas ainda precisamos rodar alguns comandos para finalizar!

Agora será necessário acessar o container para instalar os arquivos do Larave.
```sh
docker exec -it supera-app composer install
```
```sh
docker exec -it supera-app php artisan migrate
```
```sh
docker exec -it supera-app php artisan db:seed
```

A aplicação já pode ser acessada pelo endereço [http://localhost:8080]()

A Seeder irá gerar alguns dados para a aplicação. Alguns usuários foram inseridos para teste da aplicação

| Email | Senha |
|-------|-------|
|rafael@test.com| rafael |
|alessandro@test.com| alessandro |
