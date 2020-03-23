<?php

use yii\db\Migration;

/**
 * Class m200319_185417_insert_products
 */
class m200319_185417_insert_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('products', [
            'id' => NULL,
            'category' => 'biotoilet',
            'model' => 'Aspen Standard1',
            'photos' => 'none',
            'description' =>'Very good toilet for festivals',
            'standard_equipment' => 'asd',
            'technical_data' => 'asd',
            'additional_equipment' => 'asd',
            'review_link' => NULL,
            'is_rentable' => true,
            'is_sellable' => false,
            'status' => 'available'
        ]);

        $this->insert('products', [
            'id' => NULL,
            'category' => 'biotoilet',
            'model' => 'Aspen Standard2',
            'photos' => 'none',
            'description' =>'Very good toilet for festivals',
            'standard_equipment' => 'asd',
            'technical_data' => 'asd',
            'additional_equipment' => 'asd',
            'review_link' => NULL,
            'is_rentable' => false,
            'is_sellable' => true,
            'status' => 'available'
        ]);

        $this->insert('products', [
            'id' => NULL,
            'category' => 'biotoilet',
            'model' => 'Aspen Standard3',
            'photos' => 'none',
            'description' =>'Very good toilet for festivals',
            'standard_equipment' => 'asd',
            'technical_data' => 'asd',
            'additional_equipment' => 'asd',
            'review_link' => NULL,
            'is_rentable' => true,
            'is_sellable' => true,
            'status' => 'available'
        ]);

        $this->insert('products', [
            'id' => NULL,
            'category' => 'biotoilet',
            'model' => 'Aspen Standard4',
            'photos' => 'none',
            'description' =>'Very good toilet for festivals',
            'standard_equipment' => 'asd',
            'technical_data' => 'asd',
            'additional_equipment' => 'asd',
            'review_link' => NULL,
            'is_rentable' => false,
            'is_sellable' => false,
            'status' => 'available'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200319_185417_insert_products cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200319_185417_insert_products cannot be reverted.\n";

        return false;
    }
    */
}
