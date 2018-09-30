<?php

use yii\db\Migration;

/**
 * Handles adding timecode to table `landing_page`.
 */
class m180930_180515_add_timecode_column_to_landing_page_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('landing_page', 'created_at', $this->integer());
        $this->addColumn('landing_page', 'updated_at', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('landing_page', 'created_at');
        $this->dropColumn('landing_page', 'updated_at');

    }
}
