<?php

use yii\db\Migration;

/**
 * Class m210106_200133_itensdespensa
 */
class m210106_200133_itensdespensa extends Migration
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

        $this->createTable('{{%itensdespensa}}', [
            'iditemdespensa' => $this->primaryKey()->notNull(),
            'nome' => $this->string(45)->notNull(),
            'quantidade' => $this->float()->notNull(),
            'validade' => $this->date(),
            'idproduto' => $this->integer()->notNull(),
            'idutilizador' => $this->integer()->notNull()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //  echo "m210106_200133_itensdespensa cannot be reverted.\n";
        $this->dropTable('{{%itensdespensa}}');
        //  return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210106_200133_itensdespensa cannot be reverted.\n";

        return false;
    }
    */
}
