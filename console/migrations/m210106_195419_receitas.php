<?php

use yii\db\Migration;

/**
 * Class m210106_195419_receitas
 */
class m210106_195419_receitas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%receitas}}', [
            'idreceita' => $this->primaryKey()->notNull(),
            'imagem' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->notNull(),
            'nome' => $this->string(45)->notNull(),
            'duracaoreceita'=> $this->integer()->notNull(),
            'duracaopreparacao' => $this->integer()->notNull(),
            'passos' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->notNull(),
            'idutilizador' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m210106_195419_receitas cannot be reverted.\n";
        $this->dropTable('{{%receitas}}');

       // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210106_195419_receitas cannot be reverted.\n";

        return false;
    }
    */
}
