<?php

use yii\db\Migration;

class m170911_150156_create_table_employee_pay extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%employee_pay}}', [
            'payId' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'employeeId' => $this->string(10)->notNull(),
            'payPeriodMonth' => $this->integer(11)->notNull(),
            'payStartDate' => $this->date()->notNull(),
            'payEndDate' => $this->date()->notNull(),
            'minimumCap' => $this->decimal(10,2)->notNull(),
            'maximumCap' => $this->decimal(10,2)->notNull(),
            'applyValueRate' => $this->decimal(10,2)->notNull(),
            'incomeTaxFixedRate' => $this->decimal(10,2)->notNull(),
            'incomeTaxRate' => $this->decimal(10,3)->notNull(),
            'grossAnnualIncome' => $this->decimal(10,2)->notNull(),
            'grossIncome' => $this->decimal(10,2)->notNull(),
            'super' => $this->decimal(10,2)->notNull(),
            'status' => $this->smallInteger(1)->notNull(),
        ], $tableOptions);

        $this->addForeignKey('employeeId_UserProfile', '{{%employee_pay}}', 'employeeId', '{{%employee_profile}}', 'employeeId');
    }

    public function safeDown()
    {
        $this->dropTable('{{%employee_pay}}');
    }
}
