<?php

use yii\db\Migration;

/**
 * Handles adding is_manager to table `comment`.
 */
class m190709_091823_add_is_manager_column_to_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('comment', 'is_manager', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('comment', 'is_manager');
    }
}
