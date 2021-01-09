<?php namespace backend\tests;

use app\models\Categoria;
use app\models\CodigoBarras;
use app\models\Produto;
use common\fixtures\UserFixture;

class CodigosBarrasTest extends \Codeception\Test\Unit
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
    }

    protected function _after()
    {
        Categoria::deleteAll();
        Produto::deleteAll();
        CodigoBarras::deleteAll();
    }

    // tests

    public static function addCodigoBarras()
    {
        $codigoBarras = new CodigoBarras();
        $codigoBarras->codigobarras = 9999999999999;
        $codigoBarras->nome = 'Sou um codigo de barra gerado';
        $codigoBarras->marca = 'Marca';
        $codigoBarras->quantidade = 69;
        $codigoBarras->idproduto = 9999;

        return $codigoBarras;
    }

    public function testAddCodigoBarras()
    {
        $codigoBarras = $this->addCodigoBarras();
        $this->assertTrue($codigoBarras->save());
        $this->tester->seeRecord(CodigoBarras::class, ['codigobarras' => '9999999999999']);
    }

    public function testAddErroCodigoBarras()
    {
        $codigoBarras = new CodigoBarras();
        $codigoBarras->codigobarras = 9999999999999;
        $codigoBarras->nome = 'Sou um codigo de barra gerado';
        $codigoBarras->marca = 'Marca';
        $codigoBarras->quantidade = 69;
        $codigoBarras->idproduto = 'Um ID';

        $this->assertFalse($codigoBarras->save());
        $this->tester->dontseeRecord(CodigoBarras::class, ['codigobarras' => '9999999999999']);

        return $codigoBarras;
    }

    public function testDeleteCodigoBarras()
    {
        $codigoBarras = $this->addCodigoBarras();
        $codigoBarras->save();

        $this->tester->seeRecord(CodigoBarras::class, ['codigobarras' => '9999999999999']);

        $codigoBarras->delete();
        $this->tester->dontSeeRecord(CodigoBarras::class, ['codigobarras' => '9999999999999']);
    }

    public function testEditProduto()
    {
        $codigoBarras = $this->addCodigoBarras();
        $codigoBarras->save();
        $codigoBarras->marca = 'Marca teste';
        $codigoBarras->save();
        $this->tester->seeRecord(CodigoBarras::class, ['codigobarras' => '9999999999999', 'marca' => 'Marca teste']);
    }

}