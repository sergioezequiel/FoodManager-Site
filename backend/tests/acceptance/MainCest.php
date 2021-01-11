<?php namespace backend\tests\acceptance;

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
        $I->fillField('#receita-nome', 'Uma receita');
        $I->fillField('#receita-duracaopreparacao', '60');
        $I->fillField('#receita-duracaoreceita', '40');
        $I->fillField('#receita-passos', 'Passos para uma receita para se comer');
        $I->fillField('#receita-idutilizador', '1');
        $I->wait(1);
        $I->click('Save');
        $I->wait(2);
        $I->seeRecord(Receita::class, ['nome' => 'Uma receita']);


        $I->makeScreenshot('teto');
        $I->wait(2);
    }

}
