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

        try {
            $I->click('About Us', '.nav');
        } catch (\Exception $e) {
            $I->click(['class' => 'navbar-toggler']);
            $I->wait(2);
            $I->click('About Us', '.nav');
        }

        $I->seeCurrentUrlEquals('/index-test.php/site/aboutus');
        $I->wait(2);
    }

    public function checkAboutUs(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/aboutus'));
        $I->seeCurrentUrlEquals('/index-test.php/site/aboutus');

        try {
            $I->click('Faq', '.nav');
        } catch (\Exception $e) {
            $I->click(['class' => 'navbar-toggler']);
            $I->wait(2);
            $I->click('Faq', '.nav');
        }

        $I->seeCurrentUrlEquals('/index-test.php/site/faq');
        $I->wait(2);
    }
}
