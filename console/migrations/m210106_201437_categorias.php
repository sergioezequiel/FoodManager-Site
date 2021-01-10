<?php

use yii\db\Migration;

/**
 * Class m210106_201437_categorias
 */
class m210106_201437_categorias extends Migration
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

        $this->createTable('{{%categorias}}', [
            'idcategoria' => $this->primaryKey()->notNull(),
            'nome' => $this->string(45)->notNull()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m210106_201437_categorias cannot be reverted.\n";
        $this->dropTable('{{%categorias}}');
        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210106_201437_categorias cannot be reverted.\n";

        return false;
    }
    */
}
