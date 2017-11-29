<?php

use yii\db\Migration;

/**
 * Class m171129_020030_create_table_applicants
 */
class m171129_020030_create_table_applicants extends Migration
{
    public $table = 'applicants';
    public function safeUp()
    {
         $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            "name" => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'last_name2' => $this->string(),
            'CURP' => $this->string(),
            'lada_celphone' => $this->integer(),
            'celphone' => $this->integer(),
            'lada_phone' => $this->integer(),
            'phone' => $this->integer(),
            'gender' => $this->string(),
            'date' => $this->date(),
            'birh_entity_id' => $this->integer(),
            'civil_status_id' => $this->integer(),
            'nationality_id' => $this->integer(),
            'email' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()

        ]);


         $this->addForeignKey(
            'fk-birth-user',
            $this->table,
            'birh_entity_id',
            'birth_entity',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-civil-user',
            $this->table,
            'civil_status_id',
            'civil_status',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-nation-user',
            $this->table,
            'nationality_id',
            'nationalities',
            'id',
            'CASCADE'
        );

    }
    public function safeDown()
    {
        echo "m171129_020030_create_table_applicants cannot be reverted.\n";


        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171129_020030_create_table_applicants cannot be reverted.\n";

        return false;
    }
    */
}
