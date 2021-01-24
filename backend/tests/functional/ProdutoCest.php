<?php namespace backend\tests\functional;
use app\models\Produto;
use backend\tests\FunctionalTester;
use common\fixtures\CategoriaFixture;
use common\fixtures\UserFixture;

class ProdutoCest
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
    public function tryAdd(FunctionalTester $I)
    {
        $I->amOnPage('/produtos/create');

        $I->fillField('#produto-nome', 'Um produto');
        $I->fillField('#produto-unidade', 'g');
        $I->fillField('#produto-imagem', 'Uma imagem para o produto');
        $I->selectOption('#produto-idcategoria', '1');
        $I->click('Save');

        $I->canSeeRecord(Produto::class, ['nome' => 'Um produto']);

        $I->cantSee('Nome cannot be blank.', '.invalid-feedback');
        $I->cantSee('Unidade cannot be blank.', '.invalid-feedback');
        $I->cantSee('Imagem cannot be blank.', '.invalid-feedback');
        $I->cantSee('Idcategoria cannot be blank.', '.invalid-feedback');
    }

    public function checkErro(FunctionalTester $I){

        $I->amOnPage('/produtos/create');

        $I->fillField('#produto-nome', '');
        $I->fillField('#produto-unidade', '');
        $I->fillField('#produto-imagem', '');
        $I->selectOption('#produto-idcategoria', '');
        $I->click('Save');

        $I->cantSeeRecord(Produto::class, ['nome' => 'Um produto']);

        $I->canSee('Nome cannot be blank.', '.invalid-feedback');
        $I->canSee('Unidade cannot be blank.', '.invalid-feedback');
        $I->canSee('Imagem cannot be blank.', '.invalid-feedback');
        $I->canSee('Idcategoria cannot be blank.', '.invalid-feedback');
    }
}
