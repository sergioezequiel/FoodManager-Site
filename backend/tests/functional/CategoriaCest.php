<?php namespace backend\tests\functional;

use app\models\Categoria;
use backend\tests\FunctionalTester;
use common\fixtures\CategoriaFixture;
use common\fixtures\UserFixture;

class CategoriaCest
{

    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ],
            'categorias' => [
                'class' => CategoriaFixture::className(),
                'dataFile' => codecept_data_dir() . 'categoria_data.php'
            ]
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'admin');
        $I->fillField('Password', 'uwuowo123');
        $I->click('login-button');
    }

    // tests
    public function tryAccessCategorias(FunctionalTester $I)
    {
        //  $I->amLoggedInAs('admin');
        $I->amOnPage('/categorias/index');

        $I->see('Categorias');
        //   $I->click('logout');
    }

    public function tryFillFormCategoria(FunctionalTester $I)
    {
        $I->amOnPage('/categorias/create');
        $I->fillField('Nome', 'Uma categoria');
        $I->click('Save');
        $I->seeRecord(Categoria::class, ['nome' => 'Uma categoria']);
        $I->canSeeRecord(Categoria::class, ['nome' => 'Uma categoria']);
    }

    public function tryErroCategoria(FunctionalTester $I)
    {
        $I->amOnPage('/categorias/create');
        $I->fillField('Nome', '');
        $I->click('Save');
        $I->canSee('Nome cannot be blank.', '.help-block');
        $I->cantSeeRecord(Categoria::class, ['nome' => 'Uma categoria']);
    }

    public function checkDB(FunctionalTester $I)
    {
        $I->seeInDatabase('categorias', ['nome' => 'sim']);
        $I->seeNumRecords(4, 'categorias');
        $I->dontSeeRecord(Categoria::class, ['nome' => 'Uma categoria']);
    }
}
