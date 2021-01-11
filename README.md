# Foodman
<div align="center">

![logo](stuff/favicon.png "Logo")

</div>

## O que é?

- ### A sua refeição é a nossa preocupação!

- Quantas vezes já desistiu de realizar o seu jantar ou almoço pela única e simples razão
  da preguiça de pensar no que cozinhar?
- Em vez de ter uma alimentação saudável,
  sentamos no sofá a comer “snacks”. Com esta app, jamais terá que pensar no que
  cozinhar, a app pensa por si e mostra as
  receitas que prefere, porque a nossa preocupação é a sua satisfação.

## Instalação do source code

- ### PC

> 1- php init  
2- composer update  
3- yii migrate/fresh  


- ### Linux

> 1- php init  
2- wget https://getcomposer.org/installer  
3- mv installer installer.php  
4- php installer.php  
5- php composer.phar update  
6- yii migrate/fresh  


## Comandos Uteis
- ### Criar Migrações

> yii migrate/create exemplo

- ### Criar Testes de Aceitação, Funcionais, Unitarios
> 1-  ..\vendor\bin\codecept build   
2- (cd backend / cd frontend)   
3- ..\vendor\bin\codecept generate:test unit ExempleTest  
4- ..\\vendor\\bin\\codecept generate:cest functional  ExemploCest  
5- ..\\vendor\\bin\\codecept generate:cest acceptance  ExemploCest

- ### Correr testes
>1- ..\vendor\bin\codecept run --html  
2- ..\\vendor\\bin\\codecept run unit ExempleTest --html  
3- ..\\vendor\\bin\\codecept run acceptance ExempleCest --html
4- ..\\vendor\\bin\\codecept run functional  LoginCest --html

## Correr nos 5 terminais os serviços

- ### Terminal 1
> - yii serve --docroot="@backend/web/"  
> ---------------- ou  ---------------- 
> - yii serve --docroot="@frontend/web/"

- ### Terminal 2
> java -Dwebdriver.chrome.driver=./chromedriver.exe -jar selenium-server-standalone-3.141.59.jar

- ### Terminal 3
>mosquitto -v
> 
- ### Terminal 4
>mosquitto_sub -v -t geral

## Equipa que dezenvolveu FoodMan
>-> **Alexandre Bértolo 2190754**  
>-> **Sérgio Ezequiel 2190710**  
>-> **Vladyslav Bobko 2190749**
 

## Escola de trabalho

![logo](stuff/ESTG_ipl.jpg "Logo")