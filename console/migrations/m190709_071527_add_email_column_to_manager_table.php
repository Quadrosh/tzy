<?php

use yii\db\Migration;

/**
 * Handles adding email to table `manager`.
 */
class m190709_071527_add_email_column_to_manager_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('manager', 'email', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('manager', 'email');
    }
}
