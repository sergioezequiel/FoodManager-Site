<?php namespace backend\tests\functional;

use app\models\Feedback;
use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class FeedbackCest
{
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }


    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'admin');
        $I->fillField('Password', 'uwuowo123');
        $I->click('login-button');
        $I->amOnPage('/feedback/index');
        $I->see('Feedback');
    }

    // tests
    public function tryToCreateFeedback(FunctionalTester $I)
    {

        $I->click('Criar Feedback', 'a');
        $I->seeCurrentUrlEquals('/index-test.php/feedback/create');
        $I->fillField('Feedback[nome]', 'Joaquim Almeida');
        $I->fillField('Feedback[subjet]', 'Problemas Login');
        $I->fillField('Feedback[email]', 'joaquim.almeida@gmail.com');
        $I->fillField('Feedback[texto]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae dui purus. Morbi quis varius diam, sed consectetur mi. Praesent volutpat hendrerit eros, at dictum nulla sodales auctor.');
        $I->selectOption('Feedback[tipo]', 3);
        $I->selectOption('Feedback[idutilizador]', 2);
        $I->selectOption('Feedback[respond]', 0);
        $I->click('Save', 'button');

        $I->cantsee('Nome cannot be blank.', '.help-block');
        $I->cantsee('Subjet cannot be blank.', '.help-block');
        $I->cantsee('Email cannot be blank.', '.help-block');
        $I->cantsee('Texto cannot be blank.', '.help-block');
        $I->cantsee('Tipo cannot be blank.', '.help-block');
        $I->cantsee('Idutilizador cannot be blank.', '.help-block');


        $I->canSeeRecord(Feedback::class, ['nome' => 'Joaquim Almeida', 'respond' => 0]);
        $I->seeRecord(Feedback::class, ['nome' => 'Joaquim Almeida', 'respond' => 0]);

        $I->seeCurrentUrlEquals('/index-test.php/feedback/view?id=' . Feedback::find()->select(['idfeedback' => 'MAX(`idfeedback`)'])->one()->idfeedback);
    }

    public function tryToEditFeedback(FunctionalTester $I)
    {

        $I->click('Criar Feedback', 'a');
        $I->seeCurrentUrlEquals('/index-test.php/feedback/create');
        $I->fillField('Feedback[nome]', 'Joaquim Almeida');
        $I->fillField('Feedback[subjet]', 'Problemas Login');
        $I->fillField('Feedback[email]', 'joaquim.almeida@gmail.com');
        $I->fillField('Feedback[texto]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae dui purus. Morbi quis varius diam, sed consectetur mi. Praesent volutpat hendrerit eros, at dictum nulla sodales auctor.');
        $I->selectOption('Feedback[tipo]', 3);
        $I->selectOption('Feedback[idutilizador]', 2);
        $I->selectOption('Feedback[respond]', 0);
        $I->click('Save', 'button');

        $I->cantsee('Nome cannot be blank.', '.help-block');
        $I->cantsee('Subjet cannot be blank.', '.help-block');
        $I->cantsee('Email cannot be blank.', '.help-block');
        $I->cantsee('Texto cannot be blank.', '.help-block');
        $I->cantsee('Tipo cannot be blank.', '.help-block');
        $I->cantsee('Idutilizador cannot be blank.', '.help-block');


        $I->canSeeRecord(Feedback::class, ['nome' => 'Joaquim Almeida', 'respond' => 0]);
        $I->seeRecord(Feedback::class, ['nome' => 'Joaquim Almeida', 'respond' => 0]);

        $I->seeCurrentUrlEquals('/index-test.php/feedback/view?id=' . Feedback::find()->select(['idfeedback' => 'MAX(`idfeedback`)'])->one()->idfeedback);

        $I->see('Joaquim Almeida');
        $I->click('Editar', 'a');

        $I->selectOption('Feedback[respond]', 1);
        $I->click('Save', 'button');
        $I->canSeeRecord(Feedback::class, ['nome' => 'Joaquim Almeida', 'respond' => 1]);
        $I->seeRecord(Feedback::class, ['nome' => 'Joaquim Almeida', 'respond' => 1]);

    }

    public function tryToDeleteFeedback(FunctionalTester $I)
    {
        $I->click('Criar Feedback', 'a');
        $I->seeCurrentUrlEquals('/index-test.php/feedback/create');
        $I->fillField('Feedback[nome]', 'Joaquim Almeida');
        $I->fillField('Feedback[subjet]', 'Problemas Login');
        $I->fillField('Feedback[email]', 'joaquim.almeida@gmail.com');
        $I->fillField('Feedback[texto]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae dui purus. Morbi quis varius diam, sed consectetur mi. Praesent volutpat hendrerit eros, at dictum nulla sodales auctor.');
        $I->selectOption('Feedback[tipo]', 3);
        $I->selectOption('Feedback[idutilizador]', 2);
        $I->selectOption('Feedback[respond]', 0);
        $I->click('Save', 'button');

        $I->cantsee('Nome cannot be blank.', '.help-block');
        $I->cantsee('Subjet cannot be blank.', '.help-block');
        $I->cantsee('Email cannot be blank.', '.help-block');
        $I->cantsee('Texto cannot be blank.', '.help-block');
        $I->cantsee('Tipo cannot be blank.', '.help-block');
        $I->cantsee('Idutilizador cannot be blank.', '.help-block');


        $I->canSeeRecord(Feedback::class, ['nome' => 'Joaquim Almeida', 'respond' => 0]);
        $I->seeRecord(Feedback::class, ['nome' => 'Joaquim Almeida', 'respond' => 0]);

        $I->seeCurrentUrlEquals('/index-test.php/feedback/view?id=' . Feedback::find()->select(['idfeedback' => 'MAX(`idfeedback`)'])->one()->idfeedback);

        $I->see('Joaquim Almeida');
        $I->amOnPage('/index-test.php/feedback/delete?id=' . Feedback::find()->select(['idfeedback' => 'MAX(`idfeedback`)'])->one()->idfeedback);

        /* $I->cantSeeRecord(Feedback::class, ['idfeedback' => Feedback::find()->select(['idfeedback' => 'MAX(`idfeedback`)'])->one()->idfeedback, 'nome' => 'Joaquim Almeida', 'respond' => 0]);
          $I->dontSeeRecord(Feedback::class, ['idfeedback' => Feedback::find()->select(['idfeedback' => 'MAX(`idfeedback`)'])->one()->idfeedback, 'nome' => 'Joaquim Almeida', 'respond' => 0]);*/

    }

    public function tryToAddErro(FunctionalTester $I)
    {
        $I->click('Criar Feedback', 'a');
        $I->seeCurrentUrlEquals('/index-test.php/feedback/create');
        $I->fillField('Feedback[nome]', '');
        $I->fillField('Feedback[subjet]', '');
        $I->fillField('Feedback[email]', '');
        $I->fillField('Feedback[texto]', '');
        $I->selectOption('Feedback[tipo]', '');
        $I->selectOption('Feedback[idutilizador]', '');
        $I->selectOption('Feedback[respond]', '');
        $I->click('Save', 'button');

        $I->cansee('Nome cannot be blank.', '.help-block');
        $I->cansee('Subjet cannot be blank.', '.help-block');
        $I->cansee('Email cannot be blank.', '.help-block');
        $I->cansee('Texto cannot be blank.', '.help-block');
        $I->cansee('Tipo cannot be blank.', '.help-block');
        $I->cansee('Idutilizador cannot be blank.', '.help-block');

        $I->cantSeeRecord(Feedback::class, ['idfeedback' => Feedback::find()->select(['idfeedback' => 'MAX(`idfeedback`)'])->one()->idfeedback, 'nome' => 'Joaquim Almeida', 'respond' => 0]);
        $I->dontSeeRecord(Feedback::class, ['idfeedback' => Feedback::find()->select(['idfeedback' => 'MAX(`idfeedback`)'])->one()->idfeedback, 'nome' => 'Joaquim Almeida', 'respond' => 0]);
    }
}
