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
            'category' => "ENUM('biotoilets','washbasins','handstands','showers','urinals','plumbing_modules','garbage_containers', 'disinfecting_racks')",
            'model' => $this->string()->notNull(),
            'photos' => $this->text(),
            'description' => $this->text()->notNull(),
            'standard_equipment' => $this->text(),
            'technical_data' => $this->text(),
            'additional_equipment' => $this->text(),
            'review_link' => $this->string(),
            'manufacture' => $this->string()->notNull(),
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
