<?php namespace backend\tests;

use app\models\ItemDespensa;
use app\models\Produto;
use app\models\Receita;
use common\fixtures\UserFixture;

class ItensDespensaTest extends \Codeception\Test\Unit
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
        $categoria = CategoriasTest::addCategoria();
        $categoria->save();
        $produto = ProdutoTest::addProduto();
        $produto->save();
        $user = UserTest::addUser();
        $user->save();
    }

    protected function _after()
    {
    }

    public static function addItemDespensa()
    {
        $itemDespensa = new ItemDespensa();
        $itemDespensa->iditemdespensa = 999;
        $itemDespensa->nome = 'nome do item';
        $itemDespensa->quantidade = 500;
        $itemDespensa->validade = '2021/01/25';
        $itemDespensa->idproduto = 9999;
        $itemDespensa->idutilizador = 99;

        return $itemDespensa;
    }

    // tests

    public function testBadItemDespensa()
    {
        $itemDespensa = new ItemDespensa();
        $itemDespensa->iditemdespensa = 999;
        $itemDespensa->nome = 9552;
        $itemDespensa->quantidade = 500;
        $itemDespensa->validade = '2021/01/25';
        $itemDespensa->idproduto = 'asdasd';
        $itemDespensa->idutilizador = 99;

        $this->assertFalse($itemDespensa->save());
        $this->tester->dontseeRecord(ItemDespensa::class, ['iditemdespensa' => 999]);
    }

    public function testAddItemDespensa()
    {
        $itemDespensa = $this->addItemDespensa();
        $this->assertTrue($itemDespensa->save());
        $this->tester->seeRecord(ItemDespensa::class, ['iditemdespensa' => 999]);
    }

    public function testDeleteItemDespensa()
    {
        $itemDespensa = $this->addItemDespensa();
        $itemDespensa->save();
        $this->tester->seeRecord(ItemDespensa::class, ['iditemdespensa' => 999]);
        $itemDespensa->delete();
        $this->tester->dontSeeRecord(ItemDespensa::class, ['iditemdespensa' => 999]);

    }

    public function testEditItemDespensa()
    {
        $itemDespensa = $this->addItemDespensa();
        $itemDespensa->nome = 'test';
        $itemDespensa->save();
        $this->tester->seeRecord(ItemDespensa::class, ['iditemdespensa' => 999, 'nome' => 'test']);

    }
}