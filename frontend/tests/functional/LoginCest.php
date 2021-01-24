<?php namespace frontend\tests\functional;

use common\fixtures\UserFixture;
use frontend\tests\FunctionalTester;

class LoginCest
{


    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
    }

// tests

    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php',
            ],
        ];
    }

    protected function formParams($email, $password)
    {
        return [
            'User[email]' => $email,
            'User[password]' => $password,
        ];
    }

    public function checkEmpty(FunctionalTester $I)
    {
        $I->fillField('#username', '');
        $I->fillField('#password', '');
        $I->click('Log In', '#login');

      //  $I->canSee('Email cannot be blank.','.invalid-feedback');

        $I->see('Faça o seu login:');
    }

    public function checkWrongPassword(FunctionalTester $I)
    {
        $I->submitForm('#form-signup', $this->formParams('admin', 'wrong'));
        $I->see('Faça o seu login:');

        //$I->seeValidationError('Incorrect username or password.');
    }


    public function checkValidLogin(FunctionalTester $I)
    {
        $I->fillField('#username', 'admin');
        $I->fillField('#password', 'uwuowo123');
        $I->click('Log In', '#login');
        $I->cantSee('Faça o seu login:');

        //$I->see('Logout (erau)', 'form button[type=submit]');
        //$I->dontSeeLink('Login');
        //$I->dontSeeLink('Signup');
    }

    public function checkValidLoginLogout(FunctionalTester $I)
    {
        $I->fillField('#username', 'admin');
        $I->fillField('#password', 'uwuowo123');
        $I->click('Log In', '#login');
        $I->cantSee('Faça o seu login:');


        $I->click('Logout', '.nav');
        $I->amOnPage('/site/login');
        $I->canSee('Faça o seu login:');
        //$I->see('Logout (erau)', 'form button[type=submit]');
        //$I->dontSeeLink('Login');
        //$I->dontSeeLink('Signup');

    }
}
