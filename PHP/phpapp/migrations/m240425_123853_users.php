<?php

use yii\db\Migration;

/**
 * Class m240425_123853_users
 */
class m240425_123853_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240425_123853_users cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    public function down()
    {
        $this->dropTable('users');
    }

}
