<?php namespace backend\tests;

use app\models\Categoria;
use app\models\Produto;
use Codeception\Test\Unit;
use common\fixtures\UserFixture;
use phpDocumentor\Reflection\Types\This;
use Webmozart\Assert\Assert;
use yii\helpers\VarDumper;

class CategoriasTest extends Unit
{
    /**
     * @var UnitTester
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
    }

    protected function _after()
    {
        Categoria::deleteAll();
    }

    public static function addCategoria()
    {
        $categoria = new Categoria();
        $categoria->idcategoria = 9999;
        $categoria->nome = "test";
        return $categoria;
    }


    // tests
    public function testFields()
    {
        $categoria = $this->addCategoria();
        $this->assertTrue($categoria->validate());
    }

    public function testAddCategoria()
    {
        $categoria = $this->addCategoria();
        $this->assertTrue($categoria->save());
        $this->tester->seeRecord(Categoria::class, ['idcategoria' => '9999']);
    }

    public function testAddErroCategoria()
    {
        $categoria = new Categoria();
        $categoria->idcategoria = 'id';
        $categoria->nome = "test";

        $this->assertFalse($categoria->save());
        $this->tester->dontSeeRecord(Categoria::class, ['idcategoria' => 'id']);

    }

    public function testDeleteCategoria()
    {
        $categoria = $this->addCategoria();
        $categoria->save();
        $this->tester->seeRecord(Categoria::class, ['idcategoria' => '9999']);
        $categoria->delete();
        $this->tester->dontSeeRecord(Categoria::class, ['idcategoria' => '9999']);

    }

    public function testEditCategoria()
    {

        $categoria = $this->addCategoria();
        $categoria->save();
        $categoria->nome = "test";
        $categoria->save();
        $this->tester->seeRecord(Categoria::class, ['idcategoria' => '9999', 'nome' => 'test']);

    }
}