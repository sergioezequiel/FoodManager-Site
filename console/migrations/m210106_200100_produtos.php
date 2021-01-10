<?php

use yii\db\Migration;

/**
 * Class m210106_200100_produtos
 */
class m210106_200100_produtos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%produtos}}', [
            'idproduto' => $this->primaryKey()->notNull(),
            'nome' => $this->string(45)->notNull(),
            'unidade' => $this->string(10)->notNull(),
            'imagem' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->notNull(),
            'idcategoria' => $this->integer()->notNull()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m210106_200100_produtos cannot be reverted.\n";
        $this->dropTable('{{%produtos}}');
        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210106_200100_produtos cannot be reverted.\n";

        return false;
    }
    */
}
