<?php

use yii\db\Migration;

/**
 * Class m210106_200143_ingredientes
 */
class m210106_200143_ingredientes extends Migration
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

        $this->createTable('{{%ingredientes}}', [
            'idingrediente' => $this->primaryKey()->notNull(),
            'nome' => $this->string(45)->notNull(),
            'quantnecessaria' => $this->integer()->notNull(),
            'tipopreparacao' => $this->integer()->notNull(),
            'idproduto' => $this->integer()->notNull(),
            'idreceita' => $this->integer()->notNull()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m210106_200143_ingredientes cannot be reverted.\n";
        $this->dropTable('{{%ingredientes}}');
        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210106_200143_ingredientes cannot be reverted.\n";

        return false;
    }
    */
}
