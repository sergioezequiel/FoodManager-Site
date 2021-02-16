<?php

use yii\db\Migration;

/**
 * Class m210216_163856_feedback_categoria
 */
class m210216_163856_feedback_categoria extends Migration
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

        $this->createTable('{{%feedback_categoria}}', [
            'id' => $this->primaryKey()->notNull(),
            'categoria' => $this->string()->notNull(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      /*  echo "m210216_163856_feedback_categorias cannot be reverted.\n";*/
        $this->dropTable('{{%feedback_categoria}}');
      /*  return false;*/
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210216_163856_feedback_categorias cannot be reverted.\n";

        return false;
    }
    */
}
