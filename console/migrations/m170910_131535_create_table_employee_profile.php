<?php

use yii\db\Migration;

class m170910_131535_create_table_employee_profile extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%employee_profile}}', [
            'employeeId' => $this->string(10)->notNull()->append('PRIMARY KEY'),
            'firstName' => $this->string(60)->notNull(),
            'lastName' => $this->string(60)->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%user_profile}}');
    }
}
