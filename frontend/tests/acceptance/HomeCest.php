<?php

namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{

    public function _before(AcceptanceTester $I)
    {
    }

    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
    //    $I->see('FoodMan');

       // $I->seeLink('ABOUT US');
       // $I->click('/site/aboutus');
       // $I->wait(2); // wait for page to be opened

      //  $I->see('This is the About page.');
    }
}
