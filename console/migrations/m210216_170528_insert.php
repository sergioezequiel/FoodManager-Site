<?php

use yii\db\Migration;

/**
 * Class m210216_170528_insert
 */
class m210216_170528_insert extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    { /* Categorias User Data */
        $this->insert('user', array('id' => '1', 'username' => 'guest', 'auth_key' => 'zgn2yMfmVi6LuYNcMZG3Zutkp4jLj7pt', 'password_hash' => '$2y$13$lzeM2aLd7h4.ev06D05t/.cZEFTyocagUlchxvE9a/1ymfrGAXtsS', 'password_reset_token' => NULL, 'email' => 'guest@foodman.com', 'status' => '9', 'created_at' =>  strtotime("now"), 'updated_at'=>'1607902309', 'verification_token'=>'fA_TINEEM1U_VRL-OcY04JXoMUJp71nQ_1607902309'));
        $this->insert('user', array('id' => '2', 'username' => 'admin', 'auth_key' => 'zgn2yMfmVi6LuYNcMZG3Zutkp4jLj7pt', 'password_hash' => '$2y$13$lzeM2aLd7h4.ev06D05t/.cZEFTyocagUlchxvE9a/1ymfrGAXtsS', 'password_reset_token' => NULL, 'email' => 'admin@foodman.com', 'status' => '10', 'created_at' => strtotime("now"), 'updated_at'=>'1607902309', 'verification_token'=>'fA_TINEEM1U_VRL-OcY04JXoMUJp71nQ_1607902309'));
        //$this->insert('user', array('id' => '', 'username' => '', 'auth_key' => '', 'password_hash' => '', 'password_reset_token' => '', 'email' => '', 'status' => '', 'created_at' => '', 'updated_at'=>'', 'verification_token'=>''));

        $this->insert('auth_assignment', array('item_name' => 'admin', 'user_id' => '2', 'created_at' => strtotime("now")));

        /* Categorias Insert Data */
        $this->insert('categorias', array('idcategoria' => '1', 'nome' => 'Vegetais'));
        $this->insert('categorias', array('idcategoria' => '2', 'nome' => 'Peixe'));
        $this->insert('categorias', array('idcategoria' => '3', 'nome' => 'Mercearia'));
        $this->insert('categorias', array('idcategoria' => '4', 'nome' => 'Laticíneos'));
        $this->insert('categorias', array('idcategoria' => '5', 'nome' => 'Frutas'));
        $this->insert('categorias', array('idcategoria' => '6', 'nome' => 'Carne'));
        //$this->insert('categorias', array('idcategoria' => '', 'nome' => ''));

        /* Categorias Produtos Data */
        $this->insert('produtos', array('idproduto' => '1', 'nome' => 'Atum em azeite', 'unidade' => 'g', 'imagem' => 'https://media.continente.pt/Sonae.eGlobal.Presentation.Web.Media/media.axd?resourceSearchType=2&resource=ProductId=3697794(eCsf$RetekProductCatalog$MegastoreContinenteOnline$Continente)&siteId=1&channelId=1&width=512&height=512&defaultOptions=1', 'idcategoria' => '2'));
        $this->insert('produtos', array('idproduto' => '2', 'nome' => 'Feijão Frade', 'unidade' => 'g', 'imagem' => 'https://media.continente.pt/Sonae.eGlobal.Presentation.Web.Media/media.axd?resourceSearchType=2&resource=ProductId=2859830(eCsf$RetekProductCatalog$MegastoreContinenteOnline$Continente)&siteId=1&channelId=1&width=512&height=512&defaultOptions=1', 'idcategoria' => '1'));
        $this->insert('produtos', array('idproduto' => '3', 'nome' => 'Manteiga de Amendoim Proteína', 'unidade' => 'g', 'imagem' => 'https://media.continente.pt/Sonae.eGlobal.Presentation.Web.Media/media.axd?resourceSearchType=2&siteId=1&channelId=1&mediaKey=69202e74-268c-4524-ac1b-26499e1b37b8.jpg&defaultOptions=0&externalSystem=syncpt&width=1024&height=1024&baseURL=https%3a%2f%2fsyncptsamediaprd.blob.core.windows.net%2fti-media%2f', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '4', 'nome' => 'Sal', 'unidade' => 'g', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '5', 'nome' => 'Tomilho', 'unidade' => 'g', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '6', 'nome' => 'Queijo Ralado', 'unidade' => 'g', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '4'));
        $this->insert('produtos', array('idproduto' => '7', 'nome' => 'Ovo', 'unidade' => 'u', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '4'));
        $this->insert('produtos', array('idproduto' => '8', 'nome' => 'Azeite Virgem Extra', 'unidade' => 'ml', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '9', 'nome' => 'Arroz Integral', 'unidade' => 'g', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '10', 'nome' => 'Leite de Coco', 'unidade' => 'ml', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '4'));
        $this->insert('produtos', array('idproduto' => '11', 'nome' => 'Extrato de Baunilha', 'unidade' => '', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '12', 'nome' => 'Açúcar', 'unidade' => 'g', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '13', 'nome' => 'Canela', 'unidade' => 'g', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '14', 'nome' => 'Mel', 'unidade' => 'ml', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '15', 'nome' => 'Pernas de Frango', 'unidade' => 'g', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '6'));
        $this->insert('produtos', array('idproduto' => '16', 'nome' => 'Caldo de Galinha', 'unidade' => 'ml', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '17', 'nome' => 'Cebola', 'unidade' => 'uni.', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '1'));
        $this->insert('produtos', array('idproduto' => '18', 'nome' => 'Cenoura', 'unidade' => 'uni.', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '1'));
        $this->insert('produtos', array('idproduto' => '19', 'nome' => 'Aipo', 'unidade' => 'uni.', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '1'));
        $this->insert('produtos', array('idproduto' => '20', 'nome' => 'Louro', 'unidade' => 'uni.', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '1'));
        $this->insert('produtos', array('idproduto' => '21', 'nome' => 'Dentes de Alho', 'unidade' => 'uni.', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '1'));
        $this->insert('produtos', array('idproduto' => '22', 'nome' => 'Sobremesa de Tomilho', 'unidade' => 'g', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '23', 'nome' => 'Arroz', 'unidade' => 'g', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '24', 'nome' => 'Limão', 'unidade' => 'uni.', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '1'));
        $this->insert('produtos', array('idproduto' => '25', 'nome' => 'Pimenta', 'unidade' => 'g', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '26', 'nome' => 'Salsa', 'unidade' => 'g', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '3'));
        $this->insert('produtos', array('idproduto' => '27', 'nome' => 'Laranja', 'unidade' => 'uni.', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => '5'));
        //$this->insert('produtos', array('idproduto' => '', 'nome' => '', 'unidade' => '', 'imagem' => 'https://via.placeholder.com/100x100?text=FoodMan', 'idcategoria' => ''));

        /* Receitas */
        $this->insert('receitas', array('idreceita' => '1', 'imagem' => 'https://via.placeholder.com/500x500?text=FoodMan', 'nome' => 'Arroz Doce Integral de Coco e Laranja Caramelizada', 'duracaoreceita' => '60', 'duracaopreparacao' => '0', 'passos' => '<p>Coloque ao lume o arroz com o leite de coco, o extracto de baunilha e as raspas de laranja. Deixe cozinhar em lume baixo destapado, mexendo frequentemente, durante cerca de 15 minutos ou até o arroz absorver o leite de coco e obter uma cosistência cremosa.</p>
        <p>Para as laranjas caramelizadas corte uma laranja em 8 rodelas.</p>
        <p>Numa panela coloque o sumo da outra laranja e adicione o açúcar. Deixe cozinhar até ferver, sem mexer.</p>
        <p>Quando começar a ferver, baixe o lume e mexa ocasionalmente até a mistura começar a ficar dourada e espessa. Retire do lume e adicione as rodelas de laranja. Deixe arrefecer.</p>
        <p>Sirva o arroz doce com as laranjas caramelizadas. Polvilhe com canela e um fio de leite de coco. Se desejar mais doce adicione também um fio de mel.</p>
        <p>Fonte: <a href="https://www.aldi.pt/receitas/Outra-Vez-Arroz/Arroz-Doce-Integral-de-Coco-e-Laranja-Caramelizada.html">https://www.aldi.pt/receitas/Outra-Vez-Arroz/Arroz-Doce-Integral-de-Coco-e-Laranja-Caramelizada.html</a></p>', 'idutilizador' => '1'));

        $this->insert('receitas', array('idreceita' => '2', 'imagem' => 'https://via.placeholder.com/500x500?text=FoodMan', 'nome' => 'Sopa de Frango, Limão e Arroz', 'duracaoreceita' => '35', 'duracaopreparacao' => '5', 'passos' => '<p>Coloque o frango num tacho e cubra com o caldo de galinha. Adicione as folhas de louro e tempre com sal e pimenta. Deixe cozer durante cerca de 30 minutos. Quando cozido desfie o frango e reserve a água de cozedura.</p>
        <p>Corte os legumes em rodelas. Coloque um generoso fio de Azeite Virgem Extra GUT BIO® numa panela grande e adicione a cebola, as cenouras, o aipo, o alho e o tomilho e deixe cozinhar por 5 minutos mexendo regularmente.</p>
        <p>De seguida adicione o frango desfiado, o Arroz Vaporizado BOA NOVA e a água de cozedura do frango. Deixe cozinhar em lume baixo até o arroz estar cozido.</p>
        <p>Por fim junte o sumo dos limões e tempere com sal e pimenta. Sirva de imediato com salsa picada por cima.</p>
        <p>Fonte: <a href="https://www.aldi.pt/receitas/Outra-Vez-Arroz/Sopa-de-Frango-Limao-e-Arroz.html">https://www.aldi.pt/receitas/Outra-Vez-Arroz/Sopa-de-Frango-Limao-e-Arroz.html</a></p>', 'idutilizador' => '1'));

        /* Ingredientes */
        //$this->insert('ingredientes', array('idingrediente' => '', 'nome' => '', 'quantnecessaria' => '', 'tipopreparacao' => '', 'idproduto' => '', 'idreceita' => ''));
        $this->insert('ingredientes', array('idingrediente' => '1', 'nome' => 'Arroz Integral', 'quantnecessaria' => '400', 'tipopreparacao' => '0', 'idproduto' => '9', 'idreceita' => '1'));
        $this->insert('ingredientes', array('idingrediente' => '2', 'nome' => 'Leite de Coco', 'quantnecessaria' => '400', 'tipopreparacao' => '0', 'idproduto' => '10', 'idreceita' => '1'));
        $this->insert('ingredientes', array('idingrediente' => '3', 'nome' => 'Extrato de Baunilha', 'quantnecessaria' => '5', 'tipopreparacao' => '0', 'idproduto' => '11', 'idreceita' => '1'));
        $this->insert('ingredientes', array('idingrediente' => '4', 'nome' => 'Raspa de 1 Laranja', 'quantnecessaria' => '1', 'tipopreparacao' => '0', 'idproduto' => '27', 'idreceita' => '1'));
        $this->insert('ingredientes', array('idingrediente' => '5', 'nome' => 'Laranja', 'quantnecessaria' => '2', 'tipopreparacao' => '0', 'idproduto' => '27', 'idreceita' => '1'));
        $this->insert('ingredientes', array('idingrediente' => '6', 'nome' => 'Açúcar', 'quantnecessaria' => '200', 'tipopreparacao' => '0', 'idproduto' => '12', 'idreceita' => '1'));
        $this->insert('ingredientes', array('idingrediente' => '7', 'nome' => 'Canela em Pó q.b.', 'quantnecessaria' => '0', 'tipopreparacao' => '0', 'idproduto' => '13', 'idreceita' => '1'));
        $this->insert('ingredientes', array('idingrediente' => '8', 'nome' => 'Leite de Coco q.b.', 'quantnecessaria' => '0', 'tipopreparacao' => '0', 'idproduto' => '10', 'idreceita' => '1'));
        $this->insert('ingredientes', array('idingrediente' => '9', 'nome' => 'Mel q.b.', 'quantnecessaria' => '0', 'tipopreparacao' => '0', 'idproduto' => '14', 'idreceita' => '1'));
        $this->insert('ingredientes', array('idingrediente' => '10', 'nome' => 'Pernas de Frango', 'quantnecessaria' => '450', 'tipopreparacao' => '0', 'idproduto' => '15', 'idreceita' => '2'));
        $this->insert('ingredientes', array('idingrediente' => '11', 'nome' => 'Caldo de Galinha q.b. (6-8 chávenas)', 'quantnecessaria' => '100', 'tipopreparacao' => '0', 'idproduto' => '16', 'idreceita' => '2'));
        $this->insert('ingredientes', array('idingrediente' => '12', 'nome' => 'Cebola', 'quantnecessaria' => '1', 'tipopreparacao' => '0', 'idproduto' => '17', 'idreceita' => '2'));
        $this->insert('ingredientes', array('idingrediente' => '13', 'nome' => 'Cenouras', 'quantnecessaria' => '3', 'tipopreparacao' => '0', 'idproduto' => '18', 'idreceita' => '2'));
        $this->insert('ingredientes', array('idingrediente' => '14', 'nome' => 'Aipo (talos)', 'quantnecessaria' => '3', 'tipopreparacao' => '0', 'idproduto' => '19', 'idreceita' => '2'));
        $this->insert('ingredientes', array('idingrediente' => '15', 'nome' => 'Louro (folhas)', 'quantnecessaria' => '2', 'tipopreparacao' => '0', 'idproduto' => '20', 'idreceita' => '2'));
        $this->insert('ingredientes', array('idingrediente' => '16', 'nome' => 'Alhos (dentes)', 'quantnecessaria' => '2', 'tipopreparacao' => '0', 'idproduto' => '21', 'idreceita' => '2'));
        $this->insert('ingredientes', array('idingrediente' => '17', 'nome' => 'Sobremesa de tomilho (1 colher)', 'quantnecessaria' => '5', 'tipopreparacao' => '0', 'idproduto' => '22', 'idreceita' => '2'));
        $this->insert('ingredientes', array('idingrediente' => '18', 'nome' => 'Arroz (1/2 chávenas)', 'quantnecessaria' => '100', 'tipopreparacao' => '0', 'idproduto' => '23', 'idreceita' => '2'));
        $this->insert('ingredientes', array('idingrediente' => '19', 'nome' => 'Limão', 'quantnecessaria' => '2', 'tipopreparacao' => '0', 'idproduto' => '24', 'idreceita' => '2'));
        $this->insert('ingredientes', array('idingrediente' => '20', 'nome' => 'Azeite Virgem Extra q.b.', 'quantnecessaria' => '0', 'tipopreparacao' => '0', 'idproduto' => '8', 'idreceita' => '2'));
        $this->insert('ingredientes', array('idingrediente' => '21', 'nome' => 'Sal q.b.', 'quantnecessaria' => '0', 'tipopreparacao' => '0', 'idproduto' => '4', 'idreceita' => '2'));
        $this->insert('ingredientes', array('idingrediente' => '22', 'nome' => 'Pimenta q.b.', 'quantnecessaria' => '0', 'tipopreparacao' => '0', 'idproduto' => '25', 'idreceita' => '2'));
        $this->insert('ingredientes', array('idingrediente' => '23', 'nome' => 'Salsa q.b.', 'quantnecessaria' => '0', 'tipopreparacao' => '0', 'idproduto' => '26', 'idreceita' => '2'));

        /* Feedback Categorias */
        $this->insert('feedback_categoria', array('id' => '1', 'categoria' => 'Sugestão de Receita'));
        $this->insert('feedback_categoria', array('id' => '2', 'categoria' => 'Melhoria na App'));
        $this->insert('feedback_categoria', array('id' => '3', 'categoria' => 'Sugestões'));
        $this->insert('feedback_categoria', array('id' => '4', 'categoria' => 'Produto em falta (código de barras)'));
        $this->insert('feedback_categoria', array('id' => '5', 'categoria' => 'Feedback Geral'));
        $this->insert('feedback_categoria', array('id' => '6', 'categoria' => 'Outro'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210216_164318_insert_ cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210216_170528_insert cannot be reverted.\n";

        return false;
    }
    */
}
