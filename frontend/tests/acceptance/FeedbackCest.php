<?php namespace frontend\tests\acceptance;

use common\fixtures\UserFixture;
use frontend\tests\AcceptanceTester;

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

    public function _before(AcceptanceTester $I)
    {

    }

    // tests
    public function trySendWithLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/site/login');

        $I->seeCurrentUrlEquals('/site/login');
        $I->fillField('Username', 'admin');
        $I->fillField('Password', 'uwuowo123');

        $I->click('#login');
        $I->wait(2);
        $I->dontSee('Bad Request');

        $I->seeCurrentUrlEquals('/');
        $I->wait(2);

        $I->amOnPage('/site/contactus');

        $I->see('Tem uma ideia? Tem sugestão? Nós queremos saber!');


        $I->wait(2);
        $I->click('Send', '#send');
        $I->wait(2);
        $I->cansee('Tipo cannot be blank.', '.invalid-feedback');
        $I->cansee('Subjet cannot be blank.', '.invalid-feedback');
        $I->cansee('Texto cannot be blank.', '.invalid-feedback');

        $I->wait(2);

        $I->selectOption('#feedbackform-tipo', '2');
        $I->fillField('#send input[name="FeedbackForm[subjet]"]', 'Lorem ipsum');
        $I->fillField('#send textarea[name="FeedbackForm[texto]"]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        $I->wait(2);

        $I->click('Send', '#send');
        $I->wait(2);
        $I->see('Thank you for your feedback.');
        $I->wait(2);
        $I->click('.close');
        $I->wait(2);

        try {
            $I->see('Logout');
        } catch (\Exception $e) {
            $I->click(['class' => 'navbar-toggler']);
            $I->wait(2);
            $I->see('Logout');
            $I->click('Logout', '.nav');
        }

        $I->wait(2);

        $I->seeCurrentUrlEquals('/');

        $I->wait(2);

        $I->amOnPage('/site/contactus');

        $I->wait(2);
        $I->click('Send', '#send');
        $I->wait(2);
        $I->cansee('Nome cannot be blank.', '.invalid-feedback');
        $I->cansee('Tipo cannot be blank.', '.invalid-feedback');
        $I->cansee('Subjet cannot be blank.', '.invalid-feedback');
        $I->cansee('Email cannot be blank.', '.invalid-feedback');
        $I->cansee('Texto cannot be blank.', '.invalid-feedback');

        $I->wait(2);
        $I->fillField('#send input[name="FeedbackForm[nome]"]', 'Sou Nome');
        $I->selectOption('#feedbackform-tipo', '2');
        $I->fillField('#send input[name="FeedbackForm[subjet]"]', 'Lorem ipsum');
        $I->fillField('#send input[name="FeedbackForm[email]"]', 'algum@gmail.com');
        $I->fillField('#send textarea[name="FeedbackForm[texto]"]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        $I->wait(2);
        $I->click('Send', '#send');
        $I->wait(2);
        $I->see('Thank you for your feedback.');
        $I->wait(2);
        $I->click('.close');
        $I->wait(2);
    }
}
