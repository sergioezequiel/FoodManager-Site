<?php namespace frontend\tests\functional;

use Codeception\Util\Locator;
use common\fixtures\FeedbackFixture;
use common\fixtures\UserFixture;
use frontend\tests\FunctionalTester;
use app\models\Feedback;
use frontend\controllers\SiteController;

class ContactUsCest
{
    protected $fromId = '#send';

    public function _before(FunctionalTester $I)
    {

    }

    // tests
    public function trySend(FunctionalTester $I)
    {
        $I->amOnPage('/site/contactus');
        $I->fillField('#send input[name="Feedback[nome]"]', 'Sou Nome');
        $I->selectOption('#tipo', '2');

        $I->fillField('#send input[name="Feedback[subjet]"]', 'Lorem ipsum');
        $I->fillField('#send input[name="Feedback[email]"]', 'algum@gmail.com');
        $I->fillField('#send textarea[name="Feedback[texto]"]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.');

        $I->click('Send', '#send');

        $I->cantSee('Nome cannot be blank.','.invalid-feedback');
        $I->cantSee('Subjet cannot be blank.','.invalid-feedback');
        $I->cantSee('Email cannot be blank.','.invalid-feedback');
        $I->cantSee('Texto cannot be blank.','.invalid-feedback');
    }

    public function tryErro(FunctionalTester $I)
    {
        $I->amOnPage('/site/contactus');

        $I->see('Tem uma ideia? Tem sugestão?Nós queremos saber!');
        $I->submitForm($this->fromId, []);

        $I->makeHtmlSnapshot('trest');

        $I->canSee('Nome cannot be blank.','.invalid-feedback');
        $I->canSee('Subjet cannot be blank.','.invalid-feedback');
        $I->canSee('Email cannot be blank.','.invalid-feedback');
        $I->canSee('Texto cannot be blank.','.invalid-feedback');

    }
}
