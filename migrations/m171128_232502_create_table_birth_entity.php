<?php

use yii\db\Migration;

/**
 * Class m171128_232502_create_table_birth_entity
 */
class m171128_232502_create_table_birth_entity extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('birth_entity', [
            'id' => $this->primaryKey(),
            "name_entity" => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171128_232502_create_table_birth_entity cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171128_232502_create_table_birth_entity cannot be reverted.\n";

        return false;
    }
    */
}
