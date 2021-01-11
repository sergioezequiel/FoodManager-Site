<?php namespace backend\tests;

use app\models\Feedback;
use app\models\User;
use Codeception\Test\Unit;
use common\fixtures\UserFixture;

class FeedbackTest extends Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;

    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ],
        ];
    }

    protected function _before()
    {
        $user = UserTest::addUser();
        $user->save();
    }

    protected function _after()
    {
        User::deleteAll();
        Feedback::deleteAll();
    }

    // tests
    public function addFeedback()
    {
        $feedback = new Feedback();
        $feedback->idfeedback = 99;
        $feedback->nome = "Um nome";
        $feedback->email = 'uma@asd.com';
        $feedback->subjet = "Um subjest";
        $feedback->tipo = 0;
        $feedback->texto = 'This é um teste ao feedback';
        $feedback->tipo = 0;
        $feedback->idutilizador = 99;
        return $feedback;
    }

    public function testAddFeedback()
    {
        $feedback = $this->addFeedback();
        $this->assertTrue($feedback->save());
        $this->tester->seeRecord(Feedback::class, ['idfeedback' => 99]);

    }

    public function testEditFeedback()
    {
        $feedback = $this->addFeedback();
        $feedback->save();
        $feedback->texto = 'Texto do teste foi mudado';
        $feedback->save();
        $this->tester->seeRecord(Feedback::class, ['idfeedback' => '99', 'texto' => 'Texto do teste foi mudado']);
    }

    public function testDeleteFeedback()
    {
        $feedback = $this->addFeedback();
        $feedback->save();
        $this->tester->seeRecord(Feedback::class, ['idfeedback' => 99]);
        $feedback->delete();
        $this->tester->dontSeeRecord(Feedback::class, ['idfeedback' => 99]);
    }

}