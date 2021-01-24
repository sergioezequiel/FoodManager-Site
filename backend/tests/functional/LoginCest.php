<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

/**
 * Class LoginCest
 */
class LoginCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }
    
    /**
     * @param FunctionalTester $I
     */
    public function loginUser(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'admin');
        $I->fillField('Password', 'uwuowo123');
        $I->click('login-button');

        $I->cantSee('login-button');
        $I->cantSee('Username cannot be blank.', '.invalid-feedback');
        $I->cantSee('Password cannot be blank.', '.invalid-feedback');

        $I->see('FoodManager');
        $I->makeHtmlSnapshot('test');

    }

    public function failLoginUser (FunctionalTester $I){
        $I->amOnPage('/site/login');
        $I->fillField('Username', '');
        $I->fillField('Password', '');
        $I->click('login-button');
        $I->see('Username cannot be blank.', '.invalid-feedback');
        $I->see('Password cannot be blank.', '.invalid-feedback');

        $I->makeHtmlSnapshot('test');
    }
}
