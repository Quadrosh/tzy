<?php

use yii\db\Migration;

/**
 * Handles the creation of table `price`.
 */
class m181024_210717_create_price_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('price', [
            'id' => $this->primaryKey(),
            'from_city_id' => $this->integer()->notNull(),
            'to_city_id' => $this->integer()->notNull(),
            'truck_id' => $this->integer()->notNull(),
            'shipment_type' => $this->string()->notNull(),
            'distance' => $this->integer(),
            'price' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('price');
    }
}
