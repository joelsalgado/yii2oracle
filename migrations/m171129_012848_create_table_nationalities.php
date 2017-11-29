<?php

use yii\db\Migration;

/**
 * Class m171129_012848_create_table_nationalities
 */
class m171129_012848_create_table_nationalities extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('nationalities', [
            'id' => $this->primaryKey(),
            "NAME_NATIONALITIES" => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171129_012848_create_table_nationalities cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171129_012848_create_table_nationalities cannot be reverted.\n";

        return false;
    }
    */
}
