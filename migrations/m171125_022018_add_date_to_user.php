<?php

use yii\db\Migration;

/**
 * Class m171125_022018_add_date_to_user
 */
class m171125_022018_add_date_to_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('user', 'date', $this->date());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171125_022018_add_date_to_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171125_022018_add_date_to_user cannot be reverted.\n";

        return false;
    }
    */
}
