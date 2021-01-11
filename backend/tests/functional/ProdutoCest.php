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

        $I->fillField('Nome', 'Um produto');
        $I->fillField('Unidade', 'g');
        $I->fillField('Imagem', 'https://media.continente.pt/Sonae.eGlobal.Presentation.Web.Media/media.axd?resourceSearchType=2&resource=ProductId=6225480(eCsf$RetekProductCatalog$MegastoreContinenteOnline$Continente)&siteId=1&channelId=1&width=180&height=170&defaultOptions=1');
        $I->fillField('Idcategoria', '1');
        $I->click('Save');

        $I->canSeeRecord(Produto::class, ['nome' => 'Um produto']);

        $I->cantSee('Nome cannot be blank.', '.help-block');
        $I->cantSee('Unidade cannot be blank.', '.help-block');
        $I->cantSee('Imagem cannot be blank.', '.help-block');
        $I->cantSee('Idcategoria cannot be blank.', '.help-block');
    }

    public function checkErro(FunctionalTester $I){

        $I->amOnPage('/produtos/create');

        $I->fillField('Nome', '');
        $I->fillField('Unidade', '');
        $I->fillField('Imagem', '');
        $I->fillField('Idcategoria', '');
        $I->click('Save');

        $I->cantSeeRecord(Produto::class, ['nome' => 'Um produto']);

        $I->canSee('Nome cannot be blank.', '.help-block');
        $I->canSee('Unidade cannot be blank.', '.help-block');
        $I->canSee('Imagem cannot be blank.', '.help-block');
        $I->canSee('Idcategoria cannot be blank.', '.help-block');
    }
}
