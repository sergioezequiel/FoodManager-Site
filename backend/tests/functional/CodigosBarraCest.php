<?php namespace backend\tests\functional;
use app\models\CodigoBarras;
use app\models\Produto;
use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class CodigosBarraCest
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

    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'admin');
        $I->fillField('Password', 'uwuowo123');
        $I->click('login-button');
        $I->amOnPage('/codigosbarras/create');
    }

    // tests
    public function tryAdd(FunctionalTester $I)
    {
        $I->fillField('#codigobarras-codigobarras', '16166912');
        $I->fillField('#codigobarras-nome', 'Mome de codigo');
        $I->fillField('#codigobarras-marca', 'Marca de produto');
        $I->fillField('#codigobarras-quantidade', '10');
        $I->fillField('#codigobarras-idproduto', '1');
        $I->click('Save');

        $I->cantSeeRecord(CodigoBarras::class, ['nome' => '16166912']);

        $I->cantsee('Codigobarras cannot be blank.', '.help-block');
        $I->cantsee('Nome cannot be blank.', '.help-block');
        $I->cantsee('Marca cannot be blank.', '.help-block');
        $I->cantsee('Quantidade cannot be blank.', '.help-block');
        $I->cantsee('Idproduto cannot be blank.', '.help-block');

    }


    public function checkFields(FunctionalTester $I){
        $I->fillField('#codigobarras-codigobarras', '');
        $I->fillField('#codigobarras-nome', '');
        $I->fillField('#codigobarras-marca', '');
        $I->fillField('#codigobarras-quantidade', '');
        $I->fillField('#codigobarras-idproduto', '');
        $I->click('Save');

        $I->cantSeeRecord(CodigoBarras::class, ['nome' => '']);

        $I->see('Codigobarras cannot be blank.', '.help-block');
        $I->see('Nome cannot be blank.', '.help-block');
        $I->see('Marca cannot be blank.', '.help-block');
        $I->see('Quantidade cannot be blank.', '.help-block');
        $I->see('Idproduto cannot be blank.', '.help-block');

    }


    public function sameCodigo(FunctionalTester $I){
        $I->fillField('#codigobarras-codigobarras', '16166912');
        $I->fillField('#codigobarras-nome', 'Mome de codigo');
        $I->fillField('#codigobarras-marca', 'Marca de produto');
        $I->fillField('#codigobarras-quantidade', '10');
        $I->fillField('#codigobarras-idproduto', '1');
        $I->click('Save');

        $I->canSeeRecord(CodigoBarras::class, ['codigobarras' => '16166912']);

        $I->amOnPage('/codigosbarras/create');
        $I->fillField('#codigobarras-codigobarras', '16166912');
        $I->fillField('#codigobarras-nome', 'Mome de codigo');
        $I->fillField('#codigobarras-marca', 'Marca de produto');
        $I->fillField('#codigobarras-quantidade', '10');
        $I->fillField('#codigobarras-idproduto', '1');
        $I->click('Save');

        $I->see('Codigobarras "16166912" has already been taken.', '.help-block');
    }
}
