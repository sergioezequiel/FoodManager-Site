<?php namespace frontend\tests\functional;

use common\fixtures\UserFixture;
use common\models\Feedback;
use frontend\tests\FunctionalTester;

class FeedbackCest
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
        $I->amOnPage('/site/contactus');
        $I->see('Contacte-nos');
    }

    // tests
    public function tryToSubmeterGuestTest(FunctionalTester $I)
    {

        $I->seeCurrentUrlEquals('/site/contactus');

        $I->click('Send', '#send');
        $I->cansee('Nome cannot be blank.', '.invalid-feedback');
        $I->cansee('Tipo cannot be blank.', '.invalid-feedback');
        $I->cansee('Subjet cannot be blank.', '.invalid-feedback');
        $I->cansee('Email cannot be blank.', '.invalid-feedback');
        $I->cansee('Texto cannot be blank.', '.invalid-feedback');


        $I->fillField('FeedbackForm[nome]', 'Diego Val');
        $I->selectOption('FeedbackForm[tipo]', 3);
        $I->fillField('FeedbackForm[subjet]', 'Alguma coisa Teste');
        $I->fillField('FeedbackForm[email]', 'diego@foodman.com');
        $I->fillField('FeedbackForm[texto]', 'Algo aqui e ali');

        $I->click('Send', '#send');

        $I->cantsee('Nome cannot be blank.', '.invalid-feedback');
        $I->cantsee('Subjet cannot be blank.', '.invalid-feedback');
        $I->cantsee('Email cannot be blank.', '.invalid-feedback');
        $I->cantsee('Texto cannot be blank.', '.invalid-feedback');
        $I->cantsee('Tipo cannot be blank.', '.invalid-feedback');

        $I->seeRecord(Feedback::class, ['nome'=> 'Diego Val', 'email' =>'diego@foodman.com']);

        $I->seeCurrentUrlEquals('/index-test.php');
        $I->see('Thank you for your feedback.');

    }

    public function tryToSubmeterUserTest(FunctionalTester $I){

        $I->amOnPage('/site/login');
        $I->see('Log In');

        $I->fillField('LoginForm[username]','admin');
        $I->fillField('LoginForm[password]','uwuowo123');
        $I->click('login');
        $I->seeCurrentUrlEquals('/index-test.php');

        $I->amOnPage('/site/contactus');

        $I->click('Send', '#send');
        $I->cansee('Tipo cannot be blank.', '.invalid-feedback');
        $I->cansee('Subjet cannot be blank.', '.invalid-feedback');
        $I->cansee('Texto cannot be blank.', '.invalid-feedback');

        $I->selectOption('FeedbackForm[tipo]', 3);
        $I->fillField('FeedbackForm[subjet]', 'Uma sugestão inteligente... provavelmente');
        $I->fillField('FeedbackForm[texto]', 'Será que funciona?');

        $I->click('Send', '#send');

        $I->cantsee('Nome cannot be blank.', '.invalid-feedback');
        $I->cantsee('Subjet cannot be blank.', '.invalid-feedback');
        $I->cantsee('Email cannot be blank.', '.invalid-feedback');
        $I->cantsee('Texto cannot be blank.', '.invalid-feedback');
        $I->cantsee('Tipo cannot be blank.', '.invalid-feedback');

        $I->seeRecord(Feedback::class, ['nome'=> 'Admin', 'email' =>'admin@foodman.info']);

        $I->seeCurrentUrlEquals('/index-test.php');
        $I->see('Thank you for your feedback.');
    }
}
