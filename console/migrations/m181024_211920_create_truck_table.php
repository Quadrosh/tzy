<?php

use yii\db\Migration;

/**
 * Handles the creation of table `truck`.
 */
class m181024_211920_create_truck_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('truck', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'icon' => $this->text(),
            'load_capacity' => $this->string(),
            'description' => $this->text(),
            'dimensions' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('truck');
    }
}
