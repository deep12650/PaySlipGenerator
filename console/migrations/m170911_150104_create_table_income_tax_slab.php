<?php

use yii\db\Migration;

class m170911_150104_create_table_income_tax_slab extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%income_tax_slab}}', [
            'incomeTaxSlabId' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'minimumCap' => $this->decimal(10,2)->notNull(),
            'maximumCap' => $this->decimal(10,2)->notNull(),
            'incomeTaxFixedRate' => $this->decimal(10,2)->notNull(),
            'incomeTaxRate' => $this->decimal(10,2)->notNull(),
            'applyRateValue' => $this->decimal(10,2)->notNull(),
        ], $tableOptions);
        
        $this->insert('{{%income_tax_slab}}', [
            'minimumCap' => 0,
            'maximumCap' => 18200,
            'incomeTaxFixedRate'=> 0,
            'incomeTaxRate' => 0,
            'applyRateValue' => 1,
        ], $tableOptions);

        $this->insert('{{%income_tax_slab}}', [
            'minimumCap' => 18201,
            'maximumCap' => 37000,
            'incomeTaxFixedRate'=> 0,
            'incomeTaxRate' => 19,
            'applyRateValue' => 1,
        ], $tableOptions);

        $this->insert('{{%income_tax_slab}}', [
            'minimumCap' => 37001,
            'maximumCap' => 80000,
            'incomeTaxFixedRate'=> 3572,
            'incomeTaxRate' => 32.5,
            'applyRateValue' => 1,
        ], $tableOptions);

        $this->insert('{{%income_tax_slab}}', [
            'minimumCap' => 80001,
            'maximumCap' => 180000,
            'incomeTaxFixedRate'=> 17547,
            'incomeTaxRate' => 37,
            'applyRateValue' => 1,
        ], $tableOptions);

        $this->insert('{{%income_tax_slab}}', [
            'minimumCap' => 180001,
            'maximumCap' => 0,
            'incomeTaxFixedRate'=> 54547,
            'incomeTaxRate' => 45,
            'applyRateValue' => 1,
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%income_tax_slab}}');
    }
}
