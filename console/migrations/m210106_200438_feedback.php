<?php

use yii\db\Migration;

/**
 * Class m210106_200438_feedback
 */
class m210106_200438_feedback extends Migration
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

        $this->createTable('{{%feedback}}', [
            'idfeedback' => $this->primaryKey()->notNull(),
            'nome' => $this->string()->notNull(),
            'subjet' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'texto' => $this->text()->notNull(),
            'tipo' => $this->integer()->notNull(),
            'idutilizador' => $this->integer()->notNull()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m210106_200438_feedback cannot be reverted.\n";
        $this->dropTable('{{%feedback}}');
        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210106_200438_feedback cannot be reverted.\n";

        return false;
    }
    */
}
