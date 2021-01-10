<?php

namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\db\Exception;
use yii\helpers\Url;

class MainCest
{

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
        $I->fillField('#send input[name="Feedback[nome]"]', 'Sou Nome');
        $I->selectOption('#tipo', '2');

        $I->fillField('#send input[name="Feedback[subjet]"]', 'Lorem ipsum');
        $I->fillField('#send input[name="Feedback[email]"]', 'algum@gmail.com');
        $I->fillField('#send textarea[name="Feedback[texto]"]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        $I->wait(2);

        $I->click('Send', '#send');

    }

    public function checkLogin(AcceptanceTester $I)
    {
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
        $I->fillField('#login input[name="User[email]"]', 'exemplo@gmail.com');
        $I->fillField('#login input[name=password]', '123456789');
        $I->checkOption('#login input[name=remember] ');
        $I->wait(2);

        $I->click('Log In', '#login');

        //$I->seeCurrentUrlEquals('/index-test.php/site/login');
    }
}
