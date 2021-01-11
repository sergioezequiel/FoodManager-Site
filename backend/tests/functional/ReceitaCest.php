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

        $I->fillField('Nome', 'Uma receita');
        $I->fillField('Duracaoreceita', '60');
        $I->fillField('Duracaopreparacao', '40');
        $I->fillField('Passos', 'Passos para uma receita para se comer');
        $I->fillField('Idutilizador', '1');
        $I->click('Save');
        $I->cantSee('Nome cannot be blank.', '.help-block');
        $I->cantSee('Duracaoreceita cannot be blank.', '.help-block');
        $I->cantSee('Duracaopreparacao cannot be blank.', '.help-block');
        $I->cantSee('Passos cannot be blank.', '.help-block');
        $I->cantSee('Idutilizador cannot be blank.', '.help-block');
        $I->canSeeRecord(Receita::class, ['nome' => 'Uma receita']);
        $I->seeRecord(Receita::class, ['nome' => 'Uma receita']);
    }

    public function tryReceita(FunctionalTester $I)
    {
        $I->amOnPage('/receitas/create');

        $I->fillField('Nome', '');
        $I->fillField('Duracaoreceita', '');
        $I->fillField('Duracaopreparacao', '');
        $I->fillField('Passos', '');
        $I->fillField('Idutilizador', '');
        $I->click('Save');

        $I->see('Nome cannot be blank.', '.help-block');
        $I->see('Duracaoreceita cannot be blank.', '.help-block');
        $I->see('Duracaopreparacao cannot be blank.', '.help-block');
        $I->see('Passos cannot be blank.', '.help-block');
        $I->see('Idutilizador cannot be blank.', '.help-block');
    }
}
