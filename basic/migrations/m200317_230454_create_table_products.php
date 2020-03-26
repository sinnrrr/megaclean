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
            'category' => "ENUM('biotoilets','washbasins','urinals','handstands','showers','plumbing_modules','garbage_containers')",
            'model' => $this->string()->notNull(),
            'photos' => $this->text(),
            'description' => $this->text()->notNull(),
            'standard_equipment' => $this->text()->notNull(),
            'technical_data' => $this->text()->notNull(),
            'additional_equipment' => $this->text(),
            'review_link' => $this->string(),
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
