# Olá, bem vindo ao projeto Solutio, um pequeno projeto com intuito de mostrar todo conhecimento relacionado a linguagem PHP utilizando seu framework Laravel.

# Sobre o projeto

O projeto foi desenvolvido utilizando a linguagem PHP com seu framework mais renomado "Laravel" e suas funcionalidades, nossa parte de back-end está inteiramente em PHP utilizando as funcionalidades que o Laravel trás pro nosso uso, já a parte do front-end foi basicamente utilizando seu motor de renderização chamado de Blade que basicamente ele consegue ler códigos em HTML com algumas particularidades que o Laravel trás, podendo assim deixar o nosso projeto mais manutenível e de fácil implementação de novas funcionalidades.

# Para rodar este projeto, há alguns requisitos que você precisa cumprir para rodá-lo.
# Requisitos:

Precisa ter o composer instalado na sua máquina.
Precisa ter o XAMPP ou qualquer outro software para você conseguir rodar seu banco de dados de forma local.
Precisa ter o software Visual Studio Code instalado na sua máquina.

# Para utilizar o projeto, estará escrito o passo a passo para conseguir rodá-lo em sua máquina de forma local.

## 1 Step:
você precisa clonar este projeto do site https://github.com/daniloliveira-dev/solutio-test utilizando o git.
Exemplo abaixo.
```
git clone https://github.com/daniloliveira-dev/solutio-test
```

## 2 Step:
Ao clonar este projeto na sua máquina, você agora precisa instalar o Laravel utilizando o composer na sua máquina, executando o comando "composer install", ao fazer isso você estará instalando todas as dependências para conseguir executar o projeto.

## 3 Step:
Depois de ter instalado todas as dependencias do projeto, você agora precisa configurá-lo, para configurar o projeto para rodar de forma correta localmente na máquina, é necessário criar e configurar o arquivo (.env), copie e cole o conteudo do (.env.example) no arquivo (.env) que será utilizado no projeto.

feito isso, há um trecho que precisa ser alterado, para isso copie e cole o seguinte trecho de código dentro do arquivo para substituir.

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=solutio
    DB_USERNAME=root
    DB_PASSWORD=
```

## 4 Step:
Após ter configurado o .env, você já está com o projeto pré configurado em sua máquina, porém seu banco de dados local ainda não existe, para criá-lo de forma simples, você primeiro precisa criar uma database dentro do MySQL Workbench com o nome "solutio" no próprio projeto do Laravel, consegue utilizar o seguinte comando:

## php artisan migrate

Fazendo com que assim sejam criados as tabelas que serão utilizadas em seu projeto, ou se for de sua preferência, estarei disponibilizando o arquivo .sql no git juntamente com o projeto que você só precisará importar o arquivo dentro do seu MySQL Workbench.

## 5 Step:
Depois de ter configurado o banco de dados, seu projeto está pronto para rodar na máquina de forma local, como testar?

Muito simples, com seu visual studio code aberto, você irá abrir com "Open Folder" o projeto baixado do git.
Após fazer isso, você vai verificar se o terminal do VSCODE está no diretório do projeto, caso esteja no mesmo diretório do projeto, você consegue já utilizar os comandos do Laravel, sendo assim, para criar um servidor local com o Laravel, você digitará no seu terminal o seguinte comando:

# php artisan serve

Ao fazer isso, o laravel irá criar um servidor local servindo a porta 8000 em sua máquina, e para acessá-lo basta abrir seu navegador e digitar o seguinte link:

# localhost:8000

Ao fazer isso, o seu projeto estará já estará rodando.

# Muito obrigado, diretamente para Equipe Solutio Software.