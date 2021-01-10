<?php namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use yii\helpers\Url;

class ContactUsCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/contactus'));
    }

    protected function formParams($nome, $subjet, $email, $message)
    {
        return [
            'ContactUsForm[nome]' => $nome,
            'ContactUsForm[subjet]' => $subjet,
            'ContactUsForm[email]' => $email,
            'ContactUsForm[message]' => $message,
        ];
    }

    // tests
    public function checkValidSubmit(FunctionalTester $I)
    {
        $I->submitForm('#send', $this->formParams('erau', 'password_0', 'exemplo@gmail.com','Isto é uma mensagem de teste para a picanha'));

    }

}
