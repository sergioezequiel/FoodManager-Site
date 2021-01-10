<?php namespace frontend\tests\functional;

use common\fixtures\UserFixture;
use frontend\tests\FunctionalTester;
use yii\helpers\Url;

class HomeCest
{
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php',
            ],
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
    }

    // tests
    public function tryHomeAccess(FunctionalTester $I)
    {

        $I->see('FoodMan');
        $I->seeCurrentUrlEquals('/index-test.php/site/index');
        $I->see('Este projeto foi realizado no ambito do Politecnico de Leiria, ESTG, para o curso Programação de Sistemas de Informação');
    }

    public function tryErro(FunctionalTester $I)
    {
        $I->cantSee('Ola é um test');
        $I->cantSeeLink('/site/troll');
    }
}
