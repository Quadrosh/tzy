<?php

use yii\db\Migration;

/**
 * Handles the creation of table `city`.
 */
class m181024_210811_create_city_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('city', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'parent_id' => $this->integer(),
            'distance_to_parent' => $this->integer(),
            'on_main_road' => $this->string(),
            'parent_center_direction' => $this->string(),
            'bad_road' => $this->string(),
            'comment' => $this->text(),
            'code' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('city');
    }
}
