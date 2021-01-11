<?php namespace backend\tests\functional;

use app\models\Receita;
use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class ReceitaCest
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
    }

    // tests
    public function addReceita(FunctionalTester $I)
    {
        // $I->amConnectedToDatabase('foodman_test');
        $I->amOnPage('/receitas/create');

        $I->fillField('#receita-imagem', 'Receitas para a imagem');
        $I->fillField('#receita-nome', 'Receitas com bolo');
        $I->fillField('#receita-duracaopreparacao', '80');
        $I->fillField('#receita-duracaoreceita', '60');
        $I->fillField('#receita-passos', 'Passos para uma receita para se comer um bom bolo ');
        $I->fillField('#receita-idutilizador', '1');
        $I->click('Save');
        $I->cantSee('Nome cannot be blank.', '.help-block');
        $I->cantSee('Duracaoreceita cannot be blank.', '.help-block');
        $I->cantSee('Duracaopreparacao cannot be blank.', '.help-block');
        $I->cantSee('Passos cannot be blank.', '.help-block');
        $I->cantSee('Idutilizador cannot be blank.', '.help-block');
        $I->canSeeRecord(Receita::class, ['nome' => 'Receitas com bolo']);
        $I->seeRecord(Receita::class, ['nome' => 'Receitas com bolo']);
    }

    public function tryReceita(FunctionalTester $I)
    {
        $I->amOnPage('/receitas/create');

        $I->fillField('#receita-imagem', '');
        $I->fillField('#receita-nome', '');
        $I->fillField('#receita-duracaopreparacao', '');
        $I->fillField('#receita-duracaoreceita', '');
        $I->fillField('#receita-passos', '');
        $I->fillField('#receita-idutilizador', '');
        $I->click('Save');

        $I->see('Nome cannot be blank.', '.help-block');
        $I->see('Duracaoreceita cannot be blank.', '.help-block');
        $I->see('Duracaopreparacao cannot be blank.', '.help-block');
        $I->see('Passos cannot be blank.', '.help-block');
        $I->see('Idutilizador cannot be blank.', '.help-block');
    }
}
