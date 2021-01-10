<?php

use yii\db\Migration;

/**
 * Class m210106_200450_codigosbarras
 */
class m210106_200450_codigosbarras extends Migration
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

        $this->createTable('{{%codigosbarras}}', [
            'codigobarras' => $this->bigInteger(20)->notNull(),
            'nome' => $this->string(45)->notNull(),
            'marca' => $this->string(45)->notNull(),
            'quantidade' => $this->float()->notNull(),
            'idproduto' => $this->integer()->notNull(),
            'PRIMARY KEY(codigobarras)'
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m210106_200450_codigosbarras cannot be reverted.\n";
        $this->dropTable('{{%codigosbarras}}');
        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210106_200450_codigosbarras cannot be reverted.\n";

        return false;
    }
    */
}
