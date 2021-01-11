<?php namespace backend\tests\acceptance;

use app\models\CodigoBarras;
use app\models\Receita;
use backend\tests\AcceptanceTester;
use common\fixtures\UserFixture;

class MainCest
{
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }

    public function _before(AcceptanceTester $I)
    {
        Receita::deleteAll();
        CodigoBarras::deleteAll();
    }

    public function _after(AcceptanceTester $I)
    {
        Receita::deleteAll();
        CodigoBarras::deleteAll();
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/site/index');

        $I->seeCurrentUrlEquals('/site/login');
        $I->fillField('Username', 'admin');
        $I->fillField('Password', 'uwuowo123');

        $I->click('Login', '#login-form');
        $I->wait(2);
        $I->dontSee('Bad Request');

        $I->seeCurrentUrlEquals('/site/index');

        //$I->wait(2);
        // $I->cantSee('Utilizadores', '.nav');

        $I->wait(0.5);

        try {
            $I->click('Utilizadores', '.nav');
        } catch (\Exception $exception) {
            $I->click('#sidebarToggle');
            $I->wait(2);
            $I->click('Utilizadores', '.nav');
        }

        $I->seeCurrentUrlEquals('/user/index');
        $I->wait(2);
        $I->amGoingTo('/user/view?id=1');
        $I->amOnPage('/user/view?id=1');
        // $I->click('','span.glyphicon.glyphicon-eye-open');
        $I->seeCurrentUrlEquals('/user/view?id=1');
        $I->wait(2);

        try {
            $I->click('Receitas', '.nav');
        } catch (\Exception $exception) {
            $I->click('#sidebarToggle');
            $I->wait(2);
            $I->click('Receitas', '.nav');
        }

        // $I->click('Create Receita');
        $I->wait(2);
        $I->amOnPage('/receitas/create');
        $I->seeCurrentUrlEquals('/receitas/create');
        $I->fillField('#receita-imagem', 'Uma imagem para a receita');
        $I->fillField('#receita-nome', 'Uma receita');
        $I->fillField('#receita-duracaopreparacao', '60');
        $I->fillField('#receita-duracaoreceita', '40');
        $I->fillField('#receita-passos', 'Passos para uma receita para se comer');
        $I->fillField('#receita-idutilizador', '1');
        $I->wait(1);
        $I->click('Save');
        $I->wait(2);
        $I->see('Uma receita');

        $I->click('Editar');
        $I->clearField('#receita-imagem');
        $I->clearField('#receita-nome');
        $I->clearField('#receita-duracaopreparacao');
        $I->clearField('#receita-duracaoreceita');
        $I->clearField('#receita-passos');
        $I->clearField('#receita-idutilizador');
        $I->wait(1);
        $I->fillField('#receita-imagem', 'Receitas para a imagem');
        $I->fillField('#receita-nome', 'Receitas com bolo');
        $I->fillField('#receita-duracaopreparacao', '80');
        $I->fillField('#receita-duracaoreceita', '60');
        $I->fillField('#receita-passos', 'Passos para uma receita para se comer um bom bolo ');
        $I->fillField('#receita-idutilizador', '1');

        $I->wait(1);
        $I->click('Save');
        $I->wait(2);
        $I->see('Receitas para a imagem');
        $I->click('Eliminar');
        $I->canSeeInPopup('Tem a certeza que pretende eliminar este item?');
        $I->acceptPopup();
        $I->wait(1);

        $I->makeScreenshot('teto');
        $I->wait(2);


        /*  Create categoria  */

        $I->openNewTab('/categorias/index');
        $I->wait(2);
        $I->amOnPage('/categorias/create');
        $I->seeCurrentUrlEquals('/categorias/create');

        $I->fillField('#categoria-nome', 'Uma categoria');
        $I->wait(1);
        $I->click('Guardar');

        $I->see('Uma categoria');
        $I->wait(1);
        $I->click('Editar');

        $I->clearField('#categoria-nome');
        $I->wait(1);
        $I->fillField('#categoria-nome', 'Categoria de uma');
        $I->wait(1);
        $I->click('Guardar');

        $I->wait(2);
        $I->see('Categoria de uma');
        $I->click('Eliminar');
        $I->canSeeInPopup('Tem a certeza que pretende eliminar este item?');
        $I->acceptPopup();
        $I->wait(1);

        $I->makeScreenshot('teto');
        $I->wait(2);


        /*  Create Porduto  */
        $I->openNewTab('/produtos/index');
        $I->wait(2);
        $I->amOnPage('/produtos/create');
        $I->seeCurrentUrlEquals('/produtos/create');

        $I->fillField('#produto-nome', 'Um produto');
        $I->fillField('#produto-unidade', 'g');
        $I->fillField('#produto-imagem', 'Uma imagem para o produto');
        $I->fillField('#produto-idcategoria', '1');
        $I->wait(1);
        $I->click('Save');

        $I->see('Um produto');
        $I->wait(1);
        $I->click('Editar');

        $I->clearField('#produto-nome');
        $I->clearField('#produto-unidade');
        $I->clearField('#produto-imagem');
        $I->clearField('#produto-idcategoria');
        $I->wait(1);

        $I->fillField('#produto-nome', 'Produto de um');
        $I->fillField('#produto-unidade', 'u');
        $I->fillField('#produto-imagem', 'Imagem de produto');
        $I->fillField('#produto-idcategoria', '2');

        $I->wait(1);
        $I->click('Save');

        $I->wait(2);
        $I->see('Produto de um');
        $I->click('Eliminar');
        $I->canSeeInPopup('Tem a certeza que pretende eliminar este item?');
        $I->acceptPopup();
        $I->wait(1);

        $I->openNewTab('/codigosbarras/index');
        $I->wait(2);
        $I->amOnPage('/codigosbarras/create');
        $I->seeCurrentUrlEquals('/codigosbarras/create');

        $I->see('Criar Código Barras');

        $I->fillField('#codigobarras-codigobarras', '16166932');
        $I->fillField('#codigobarras-nome', 'Mome de codigo');
        $I->fillField('#codigobarras-marca', 'Marca de produto');
        $I->fillField('#codigobarras-quantidade', '10');
        $I->fillField('#codigobarras-idproduto', '1');
        $I->wait(1);
        $I->click('Save');

        $I->wait(1);
        $I->see('Mome de codigo');

        $I->click('Editar');

        $I->clearField('#codigobarras-codigobarras');
        $I->clearField('#codigobarras-nome');
        $I->clearField('#codigobarras-marca');
        $I->clearField('#codigobarras-quantidade');
        $I->clearField('#codigobarras-idproduto');
        $I->wait(1);

        $I->fillField('#codigobarras-codigobarras', '82669250');
        $I->fillField('#codigobarras-nome', 'g');
        $I->fillField('#codigobarras-marca', 'De uma marca');
        $I->fillField('#codigobarras-quantidade', '10');
        $I->fillField('#codigobarras-idproduto', '1');

        $I->wait(1);
        $I->click('Save');

        $I->wait(2);
        $I->see('De uma marca');
        $I->click('Eliminar');
        $I->canSeeInPopup('Tem a certeza que pretende eliminar este item?');
        $I->wait(1);
        $I->acceptPopup();
        $I->wait(1);

        $I->amOnPage('/itensdespensa/index');
        $I->wait(1);
        $I->see('Despensas');
        $I->amOnPage('/feedback/index');
        $I->wait(1);
        $I->see('Feedback');

        $I->makeScreenshot('teto');
        $I->wait(1);
        $I->amOnPage('/site/logout');
        $I->wait(1);
        $I->see('Please fill out the following fields to login:');

    }

}
