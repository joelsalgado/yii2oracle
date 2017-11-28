<?php

use yii\db\Migration;

/**
 * Class m171124_211528_create_table_users
 */
class m171124_211528_create_table_users extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            "name" => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'last_name2' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171124_211528_create_table_users cannot be reverted.\n";
        $this->dropTable('user');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171124_211528_create_table_users cannot be reverted.\n";

        return false;
    }
    */
}
