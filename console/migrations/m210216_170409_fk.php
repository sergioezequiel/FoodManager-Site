<?php

use yii\db\Migration;

/**
 * Class m210216_170409_fk
 */
class m210216_170409_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* Categorias Receitas FK */
        $this->addForeignKey('fk_Receitas_Utilizador_idx','{{%receitas}}','idutilizador','{{%user}}','id','CASCADE');

        /* Categorias Produtos FK */
        $this->addForeignKey('fk_Subcategorias_Categorias_idx','{{%produtos}}','idcategoria','{{%categorias}}','idcategoria','CASCADE');

        /* Categorias Itens Despensa FK */
        $this->addForeignKey('fk_Despensa_Subcategorias_idx','{{%itensdespensa}}','idproduto','{{%produtos}}','idproduto','CASCADE');
        $this->addForeignKey('fk_ItensDespensa_Utilizador_idx','{{%itensdespensa}}','idutilizador','{{%user}}','id','CASCADE');

        /* Categorias Ingredientes FK */
        $this->addForeignKey('fk_Ingredientes_Receitas_idx','{{%ingredientes}}','idreceita','{{%receitas}}','idreceita','CASCADE');
        $this->addForeignKey('fk_Ingredientes_Subcategorias_idx','{{%ingredientes}}','idproduto','{{%produtos}}','idproduto','CASCADE');

        /* Categorias Feedback FK */
        $this->addForeignKey('ffk_Feedback_Utilizador_idx','{{%feedback}}','idutilizador','{{%user}}','id','CASCADE');

        /* Categorias Codigos Barras FK */
        $this->addForeignKey('fk_CodigosBarras_Subcategorias_idx','{{%codigosbarras}}','idproduto','{{%produtos}}','idproduto','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m210106_201437_s_fk cannot be reverted.\n";

        /* Categorias Receitas FK */
        $this->dropForeignKey('fk_Receitas_Utilizador_idx','{{%receitas}}');

        /* Categorias Produtos FK */
        $this->dropForeignKey('fk_Subcategorias_Categorias_idx','{{%produtos}}');

        /* Categorias Itens Despensa FK */
        $this->dropForeignKey('fk_Despensa_Subcategorias_idx','{{%itensdespensa}}');
        $this->dropForeignKey('fk_ItensDespensa_Utilizador_idx','{{%itensdespensa}}');

        /* Categorias Ingredientes FK */
        $this->dropForeignKey('fk_Ingredientes_Subcategorias_idx','{{%ingredientes}}');
        $this->dropForeignKey('fk_Ingredientes_Receitas_idx','{{%ingredientes}}');

        /* Categorias Feedback FK */
        $this->dropForeignKey('ffk_Feedback_Utilizador_idx','{{%feedback}}');

        /* Categorias Codigos Barras FK */
        $this->dropForeignKey('fk_CodigosBarras_Subcategorias_idx','{{%codigosbarras}}');

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210216_170409_fk cannot be reverted.\n";

        return false;
    }
    */
}
