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

        $I->see('', '.invalid-feedback');
    }

    public function tryErro(FunctionalTester $I)
    {
        $I->amOnPage('/site/contactus');

        $I->see('Tem uma ideia? Tem sugestão?Nós queremos saber!');
        $I->submitForm($this->fromId, []);

        $I->makeHtmlSnapshot('PILA');
        $I->canSee('Nome cannot be blank.','.invalid-feedback');
       //$I->seeElement( Locator::contains('div[@invalid-feedback]', 'Nome cannot be blank.'));
        //$I->seeElement( Locator::contains('div[@invalid-feedback]', 'Subjet cannot be blank.'));
        //$I->seeElement( Locator::contains('div[@invalid-feedback]', 'Email cannot be blank.'));
        //$I->seeElement( Locator::contains('div[@invalid-feedback]', 'Texto cannot be blank.'));

    }
}
