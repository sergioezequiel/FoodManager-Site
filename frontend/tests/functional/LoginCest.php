<?php namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class LoginCest
{


    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
    }

// tests
    protected function formParams($login, $password)
    {
        return [
            'LoginForm[username]' => $login,
            'LoginForm[password]' => $password,
        ];
    }

    public function checkEmpty(FunctionalTester $I)
    {
        $I->submitForm('#login', $this->formParams('asd@asd.com', ''));
        //$I->see('Please fill out this field.');
    }

    public function checkWrongPassword(FunctionalTester $I)
    {
        $I->submitForm('#login', $this->formParams('admin', 'wrong'));
        //$I->seeValidationError('Incorrect username or password.');
    }

    public function checkInactiveAccount(FunctionalTester $I)
    {
        $I->submitForm('#login', $this->formParams('test.test', 'Test1234'));
        //$I->seeValidationError('Incorrect username or password');
    }

    public function checkValidLogin(FunctionalTester $I)
    {
        $I->submitForm('#login', $this->formParams('erau', 'password_0'));
        //$I->see('Logout (erau)', 'form button[type=submit]');
        //$I->dontSeeLink('Login');
        //$I->dontSeeLink('Signup');
    }
}
