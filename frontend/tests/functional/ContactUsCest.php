<?php namespace frontend\tests\functional;
use common\fixtures\FeedbackFixture;
use common\fixtures\UserFixture;
use frontend\tests\FunctionalTester;
use app\models\Feedback;
use frontend\controllers\SiteController;

class ContactUsCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/site/contactus');
    }

    protected function formParams($login, $password)
    {
        return [
            'ContactUsForm[nome]' => $login,
            'ContactUsForm[n]' => $password,
        ];

    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {

    }
}
