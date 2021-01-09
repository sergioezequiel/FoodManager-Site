<?php namespace backend\tests;

use app\models\Produto;
use app\models\Receita;
use app\models\User;
use Codeception\Test\Unit;
use common\fixtures\UserFixture;

class ReceitasTest extends Unit
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
        Receita::deleteAll();
        User::deleteAll();
    }

    public static function addReceita()
    {
        $receita = new Receita();
        $receita->idreceita = 99;
        $receita->nome = 'Uma receita teste';
        $receita->duracaoreceita = 60;
        $receita->duracaopreparacao = 40;
        $receita->passos = 'Alguns passos para a receita';
        $receita->idutilizador = 99;

        return $receita;
    }

    // tests
    public function testAddReceita()
    {
        $receita = $this->addReceita();
        $this->assertTrue($receita->save());
        $this->tester->seeRecord(Receita::class, ['idreceita' => '99']);
    }


    public function testDeleteReceita()
    {
        $receita = $this->addReceita();
        $receita->save();

        $this->tester->seeRecord(Produto::class, ['idreceita' => '99']);
        $receita->delete();

        $this->tester->dontSeeRecord(Produto::class, ['idproduto' => '99']);

    }


    public function testEditReceitas()
    {
        $receita = $this->addReceita();
        $receita->nome = 'test';
        $receita->save();
        $this->tester->seeRecord(Receita::class, ['idreceita' => 99, 'nome' => 'test']);

    }

    public function testBadReceita()
    {
        $receita = new Receita();
        $receita->idreceita = 99;
        $receita->nome = 'Uma receita teste';
        $receita->passos = 'Alguns passos para a receita';
        $receita->idutilizador = 99;
        $this->assertFalse($receita->save());
        $this->tester->dontSeeRecord(Produto::class, ['idproduto' => '99']);
    }
}