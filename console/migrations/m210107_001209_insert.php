<?php

use yii\db\Migration;

/**
 * Class m210107_001209_insert
 */
class m210107_001209_insert extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* Categorias User Data */
        $this->insert('user', array('id' => '1', 'username' => 'admin', 'auth_key' => 'zgn2yMfmVi6LuYNcMZG3Zutkp4jLj7pt', 'password_hash' => '$2y$13$lzeM2aLd7h4.ev06D05t/.cZEFTyocagUlchxvE9a/1ymfrGAXtsS', 'password_reset_token' => 'NULL', 'email' => 'admin@foodman.com', 'status' => '10', 'created_at' => '1607902309', 'updated_at'=>'1607902309', 'verification_token'=>'fA_TINEEM1U_VRL-OcY04JXoMUJp71nQ_1607902309'));
        //$this->insert('user', array('id' => '', 'username' => '', 'auth_key' => '', 'password_hash' => '', 'password_reset_token' => '', 'email' => '', 'status' => '', 'created_at' => '', 'updated_at'=>'', 'verification_token'=>''));

        /* Categorias Insert Data */
        $this->insert('categorias', array('idcategoria' => '1', 'nome' => 'Vegetais'));
        $this->insert('categorias', array('idcategoria' => '2', 'nome' => 'Peixe'));
        $this->insert('categorias', array('idcategoria' => '3', 'nome' => 'Mercearia'));
        $this->insert('categorias', array('idcategoria' => '4', 'nome' => 'Laticíneos'));
        //$this->insert('categorias', array('idcategoria' => '', 'nome' => ''));

        /* Categorias Produtos Data */
        $this->insert('produtos', array('idproduto' => '1', 'nome' => 'Atum em azeite', 'unidade' => 'g', 'imagem' => 'https://media.continente.pt/Sonae.eGlobal.Presentation.Web.Media/media.axd?resourceSearchType=2&resource=ProductId=3697794(eCsf$RetekProductCatalog$MegastoreContinenteOnline$Continente)&siteId=1&channelId=1&width=512&height=512&defaultOptions=1', 'idcategoria' => '2'));
        $this->insert('produtos', array('idproduto' => '2', 'nome' => 'Feijão Frade', 'unidade' => 'g', 'imagem' => 'https://media.continente.pt/Sonae.eGlobal.Presentation.Web.Media/media.axd?resourceSearchType=2&resource=ProductId=2859830(eCsf$RetekProductCatalog$MegastoreContinenteOnline$Continente)&siteId=1&channelId=1&width=512&height=512&defaultOptions=1', 'idcategoria' => '1'));
        $this->insert('produtos', array('idproduto' => '3', 'nome' => 'Manteiga de Amendoim Proteína', 'unidade' => 'g', 'imagem' => 'https://media.continente.pt/Sonae.eGlobal.Presentation.Web.Media/media.axd?resourceSearchType=2&siteId=1&channelId=1&mediaKey=69202e74-268c-4524-ac1b-26499e1b37b8.jpg&defaultOptions=0&externalSystem=syncpt&width=1024&height=1024&baseURL=https%3a%2f%2fsyncptsamediaprd.blob.core.windows.net%2fti-media%2f', 'idcategoria' => '3'));
        //$this->insert('categorias', array('idproduto' => '', 'nome' => '', 'unidade' => '', 'imagem' => '', 'idcategoria' => ''));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210107_001209_insert cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210107_001209_insert cannot be reverted.\n";

        return false;
    }
    */
}
