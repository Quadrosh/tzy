<?php

use yii\db\Migration;

/**
 * Handles adding status to table `landing_page`.
 */
class m180930_181212_add_status_column_to_landing_page_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('landing_page', 'status', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('landing_page', 'status');
    }
}
