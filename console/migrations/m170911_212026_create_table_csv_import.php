<?php

use yii\db\Migration;

class m170911_212026_create_table_csv_import extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%csv_import}}', [
            'csvId' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'csvFileName' => $this->string(250)->notNull(),
            'totalRecords' => $this->integer(11)->notNull(),
            'processRecords' => $this->integer(11),
            'status' => $this->smallInteger(1)->notNull(),
            'timestamp' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%csv_import}}');
    }
}
