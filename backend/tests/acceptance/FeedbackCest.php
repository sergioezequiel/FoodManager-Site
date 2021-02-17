<?php namespace frontend\tests\acceptance;
use app\models\Feedback;
use backend\tests\AcceptanceTester;
use common\fixtures\UserFixture;

class FeedbackCest
{
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/site/index');

        $I->seeCurrentUrlEquals('/site/login');
        $I->fillField('Username', 'admin');
        $I->fillField('Password', 'uwuowo123');

        $I->click('Login', '#login-form');
        $I->wait(2);
        $I->dontSee('Bad Request');

        $I->seeCurrentUrlEquals('/site/index');
        $I->wait(2);
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/feedback/index');
        $I->seeCurrentUrlEquals('/feedback/index');
        $I->wait(2);
        $I->click('Criar Feedback');

        $I->seeCurrentUrlEquals('/feedback/create');
        $I->wait(2);
        $I->click('Save');
        $I->wait(2);
        $I->cansee('Nome cannot be blank.', '.help-block');
        $I->cansee('Subjet cannot be blank.', '.help-block');
        $I->cansee('Email cannot be blank.', '.help-block');
        $I->cansee('Texto cannot be blank.', '.help-block');
        $I->cansee('Tipo cannot be blank.', '.help-block');
        $I->cansee('Idutilizador cannot be blank.', '.help-block');

        $I->wait(2);
        $I->fillField('Feedback[nome]', 'Joaquim Almeida');
        $I->fillField('Feedback[subjet]', 'Problemas Login');
        $I->fillField('Feedback[email]', 'joaquim.almeida@gmail.com');
        $I->fillField('Feedback[texto]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae dui purus. Morbi quis varius diam, sed consectetur mi. Praesent volutpat hendrerit eros, at dictum nulla sodales auctor.');
        $I->selectOption('Feedback[tipo]', 3);
        $I->selectOption('Feedback[idutilizador]', 2);
        $I->selectOption('Feedback[respond]', 0);
        $I->wait(2);
        $I->click('Save');
        $I->wait(2);
        $I->cantsee('Nome cannot be blank.', '.help-block');
        $I->cantsee('Subjet cannot be blank.', '.help-block');
        $I->cantsee('Email cannot be blank.', '.help-block');
        $I->cantsee('Texto cannot be blank.', '.help-block');
        $I->cantsee('Tipo cannot be blank.', '.help-block');
        $I->cantsee('Idutilizador cannot be blank.', '.help-block');
        $I->wait(2);

        $I->click('Editar');
        $I->selectOption('Feedback[respond]', 1);
        $I->wait(2);
        $I->click('Save');

        $I->click('Eliminar');
        $I->seeInPopup('Tem a certeza que pretende eliminar este item?');
        $I->wait(2);
        $I->acceptPopup();
        $I->wait(2);
    }
}
