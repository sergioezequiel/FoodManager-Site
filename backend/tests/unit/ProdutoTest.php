<?php namespace backend\tests;

use app\models\Categoria;
use backend\tests\CategoriasTest;
use app\models\Produto;
use common\fixtures\UserFixture;

class ProdutoTest extends \Codeception\Test\Unit
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
    }

    protected function _after()
    {
        Produto::deleteAll();
        Categoria::deleteAll();
    }


    // tests

    public static function addProduto(){
        $produto = new Produto();
        $produto->idproduto = 9999;
        $produto->nome = 'Teste do produto';
        $produto->unidade = 'g';
        $produto->imagem = 'https://mediadeumaimagem.com';
        $produto->idcategoria = 9999;

        return $produto;
    }

    public function testFields()
    {
        $produto = $this->addProduto();
        $this->assertTrue($produto->validate());
    }

    public function testAddProduto()
    {
        $produto = $this->addProduto();
        $produto->save();

        $this->assertTrue($produto->save());
        $this->tester->seeRecord(Produto::class, ['idproduto' => '9999']);

    }

    public function testDeleteProduto()
    {
        $produto = $this->addProduto();
        $produto->save();
        $this->tester->seeRecord(Produto::class, ['idproduto' => '9999']);
        $produto->delete();
        $this->tester->dontSeeRecord(Produto::class, ['idproduto' => '9999']);

    }

    public function testErroAddProduto()
    {
        $produto = new Produto();
        $produto->idproduto = 9999;
        $produto->nome = 'Teste do produto';
        $produto->unidade = 'g';
        $produto->imagem = 'https://mediadeumaimagem.com';
        $produto->idcategoria = 'id';

        $this->assertFalse($produto->save());
        $this->tester->dontSeeRecord(Produto::class, ['idproduto' => '9999']);

    }

    public function testEditProduto()
    {
        $produto = $this->addProduto();
        $produto->nome = 'test';
        $produto->save();
        $this->tester->seeRecord(Produto::class, ['idproduto' => 9999, 'nome' => 'test']);

    }
}