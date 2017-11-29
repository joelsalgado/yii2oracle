<?php

use yii\db\Migration;

/**
 * Class m171129_003138_create_table_civil_status
 */
class m171129_003138_create_table_civil_status extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('civil_status', [
            'id' => $this->primaryKey(),
            "name_civil_status" => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171129_003138_create_table_civil_status cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171129_003138_create_table_civil_status cannot be reverted.\n";

        return false;
    }
    */
}
