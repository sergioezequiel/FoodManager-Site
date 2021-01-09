<?php namespace backend\tests;

use app\models\Categoria;
use app\models\Ingrediente;
use app\models\Produto;
use app\models\Receita;
use app\models\User;

class IngredientesTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $categoria = CategoriasTest::addCategoria();
        $categoria->save();
        $produto = ProdutoTest::addProduto();
        $produto->save();
        $user = UserTest::addUser();
        $user->save();
        $receita = ReceitasTest::addReceita();
        $receita->save();
    }

    protected function _after()
    {
        Categoria::deleteAll();
        Produto::deleteAll();
        User::deleteAll();
        Receita::deleteAll();
    }

    public static function addIngrediente(){
        $ingrediente = new Ingrediente();
        $ingrediente->idingrediente = 99;
        $ingrediente->nome = 'Um nome';
        $ingrediente->quantnecessaria = 50;
        $ingrediente->tipopreparacao = 0;
        $ingrediente->idproduto = 9999;
        $ingrediente->idreceita = 99;

        return $ingrediente;
    }

    // tests
    public function testAddIngrediente()
    {
        $ingrediente = $this->addIngrediente();
        $this->assertTrue($ingrediente->save());
        $this->tester->seeRecord(Ingrediente::class, ['idingrediente' => 99]);
    }

    public function testDeleteIngrediente()
    {
        $ingrediente = $this->addIngrediente();
        $ingrediente->save();
        $this->tester->seeRecord(Ingrediente::class, ['idingrediente' => 99]);
        $ingrediente->delete();
        $this->tester->dontSeeRecord(Ingrediente::class, ['idingrediente' => 99]);

    }

    public function testEditIngrediente()
    {
        $ingrediente = $this->addIngrediente();
        $ingrediente->nome = 'test';
        $ingrediente->save();
        $this->tester->seeRecord(Ingrediente::class, ['idingrediente' => 99, 'nome' => 'test']);

    }
}