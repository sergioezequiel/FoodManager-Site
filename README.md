```
------------------------------------- Inicio -------------------------------------

------------- pc --------------
1. php init

------------- linux --------------
1. wget https://getcomposer.org/installer
2. mv installer installer.php
3. php installer.php
4. php composer.phar update

------------------------------------- A programar -------------------------------------

------------- cirar migrações --------------
1. yii migrate/create insert 

------------- aplicar migrações --------------
1. yii migrate/fresh

------------- gerar testes unitarios --------------
1. (cd backend / cd frontend) 
2. ..\vendor\bin\codecept generate:test unit UserTest
3. ..\\vendor\\bin\\codecept generate:cest functional  LoginCest

------------------------------------- FINAL -------------------------------------

------------- terminal 1 --------------
1. yii serve --docroot="@backend/web/"
2  yii serve --docroot="@frontend/web/"

------------- terminal 2 --------------
1. java -Dwebdriver.chrome.driver=./chromedriver.exe -jar selenium-server-standalone-3.141.59.jar

------------- terminal 3 --------------
1. (cd backend / cd frontend) 
2. ..\vendor\bin\codecept run --html

------------- terminal 4 --------------
1. mosquitto -v

------------- terminal 4 --------------
1. mosquitto_sub -v -t geral
```