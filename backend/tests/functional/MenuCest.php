<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class MenuCest
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
    }

    // tests
    public function tryToLogout(FunctionalTester $I)
    {
        $I->amOnPage('/backend/web/');
     //   $I->click('logout');
    }
}
