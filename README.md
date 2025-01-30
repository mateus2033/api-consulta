Iniciando o Projeto

1. Iniciar o ambiente Docker com Sail
Dentro da pasta do projeto, execute o seguinte comando para iniciar o projeto com o Docker:

 * ./vendor/bin/sail up => Este comando irá iniciar os containers necessários para o ambiente de desenvolvimento do projeto.

2. Acessar a imagem Docker
Acesse o container do projeto sail-8/app e execute os comandos para configurar as dependências e o banco de dados.

 * composer install - instalar as dependencias do projeto.
 * php artisan migrate:fresh --seed  - inicializar o banco da dados do projeto.

