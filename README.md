Iniciando o Projeto

1. Iniciar o ambiente Docker com Sail
Dentro da pasta do projeto, execute o seguinte comando para iniciar o projeto com o Docker:


./vendor/bin/sail up
Este comando irá iniciar os containers necessários para o ambiente de desenvolvimento do projeto.

2. Acessar a imagem Docker
Acesse o container do projeto sail-8/app e execute os comandos para configurar as dependências e o banco de dados.


docker-compose exec app bash

3. Instalar as dependências do projeto
Dentro do container, execute o comando abaixo para instalar as dependências do projeto via Composer:


composer install

4. Inicializar o banco de dados
Para configurar o banco de dados, execute o seguinte comando para rodar as migrações e popular a base de dados com dados iniciais:


php artisan migrate:fresh --seed
Este comando irá limpar o banco de dados (se necessário), executar as migrações e adicionar os dados de exemplo.

