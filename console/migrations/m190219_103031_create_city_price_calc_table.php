<?php

use yii\db\Migration;

/**
 * Handles the creation of table `city_price_calc`.
 */
class m190219_103031_create_city_price_calc_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('city_price_calc', [
            'id' => $this->primaryKey(),
            'city' => $this->string()->notNull(),
            'load_capacity' => $this->string(),
            'description' => $this->string(),
            'min_time' => $this->string(),
            'price_city' => $this->string(),
            'price_center' => $this->string(),
            'price_hist_center' => $this->string(),
            'price_outside' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('city_price_calc');
    }
}
