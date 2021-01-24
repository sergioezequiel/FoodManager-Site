<?php

namespace frontend\tests\acceptance;

use common\fixtures\UserFixture;
use frontend\tests\AcceptanceTester;
use yii\db\Exception;
use yii\helpers\Url;

class MainCest
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

    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->see('FoodMan');
        $I->seeCurrentUrlEquals('/index-test.php/site/index');
        $I->see('Tem produtos? Tem receita favorita? Aperte um botão e a sua receita está na mão.');

    }

    public function checkAboutUs(AcceptanceTester $I)
    {

        try {
            $I->click('About Us', '.nav');
        } catch (\Exception $e) {
            $I->click(['class' => 'navbar-toggler']);
            $I->wait(2);
            $I->click('About Us', '.nav');
        }

        $I->amOnPage(Url::toRoute('/site/aboutus'));
        $I->seeCurrentUrlEquals('/index-test.php/site/aboutus');

    }

    public function checkFaq(AcceptanceTester $I)
    {
        try {
            $I->click('Faq', '.nav');
        } catch (\Exception $e) {
            $I->click(['class' => 'navbar-toggler']);
            $I->wait(2);
            $I->click('Faq', '.nav');
        }

        $I->amOnPage(Url::toRoute('/site/faq'));
        $I->seeCurrentUrlEquals('/index-test.php/site/faq');
        $I->see('FAQ');

    }

    public function checkContactUs(AcceptanceTester $I)
    {
        try {
            $I->click('Contact Us', '.nav');
        } catch (\Exception $e) {
            $I->click(['class' => 'navbar-toggler']);
            $I->wait(2);
            $I->click('Contact Us', '.nav');
        }

        $I->seeCurrentUrlEquals('/index-test.php/site/contactus');
        $I->see('Tem uma ideia? Tem sugestão? Nós queremos saber!');

        $I->wait(2);
        $I->fillField('#send input[name="FeedbackForm[nome]"]', 'Sou Nome');
        $I->selectOption('#feedbackform-tipo', '2');

        $I->fillField('#send input[name="FeedbackForm[subjet]"]', 'Lorem ipsum');
        $I->fillField('#send input[name="FeedbackForm[email]"]', 'algum@gmail.com');
        $I->fillField('#send textarea[name="FeedbackForm[texto]"]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        $I->wait(2);

        $I->click('Send', '#send');
        $I->wait(3);
    }

    public function checkLogin(AcceptanceTester $I)
    {
        $I->see('Thank you for your feedback.');
        $I->click('.close');
        try {
            $I->click('Login', '.nav');
        } catch (\Exception $e) {
            $I->click(['class' => 'navbar-toggler']);
            $I->wait(2);
            $I->click('Login', '.nav');
        }

        //$I->amOnPage(Url::toRoute('/site/login'));
        $I->seeCurrentUrlEquals('/index-test.php/site/login');
        $I->see('Faça o seu login:');

        $I->wait(2);
        $I->fillField('#username', 'admin');
        $I->fillField('#password', 'uwuowo123');
        //$I->checkOption('#login input[name=remember] ');
        $I->wait(2);
        $I->click('#login');

        $I->wait(2);
        try {
            $I->see('Logout');
        } catch (\Exception $e) {
            $I->click(['class' => 'navbar-toggler']);
            $I->wait(2);
            $I->see('Logout');
        }

        $I->wait(2);

        //$I->seeCurrentUrlEquals('/index-test.php/site/login');
    }

    public function checkReceitas(AcceptanceTester $I)
    {
        $I->amOnPage('/site/receita');
        $I->wait(2);
        $I->amOnPage('/site/ingredientes?receita=2');
        $I->wait(2);
    }
}
