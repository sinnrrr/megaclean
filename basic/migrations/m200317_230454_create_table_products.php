<?php

use yii\db\Migration;

/**
 * Class m200317_230454_create_table_products
 */
class m200317_230454_create_table_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey()->unsigned(),
            'category' => "ENUM('biotoilet','washbasin')",
            'model' => $this->string()->defaultValue('')->notNull(),
            'photos' => $this->string()->defaultValue('')->notNull(),
            'standard_equipment' => $this->string()->defaultValue('')->notNull(),
            'technical_data' => $this->string()->defaultValue('')->notNull(),
            'additional_equipment' => $this->string()->defaultValue('')->notNull(),
            'is_rentable' => $this->boolean()->defaultValue(false)->notNull(),
            'is_sellable' => $this->boolean()->defaultValue(false)->notNull(),
            'status' => "ENUM('available','sold_out','disabled')"
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200317_230454_create_table_products cannot be reverted.\n";

        return false;
    }
    */
}
