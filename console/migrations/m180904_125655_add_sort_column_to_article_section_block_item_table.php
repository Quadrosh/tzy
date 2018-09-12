<?php

use yii\db\Migration;

/**
 * Handles adding sort to table `article_section_block_item`.
 */
class m180904_125655_add_sort_column_to_article_section_block_item_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('article_section_block_item', 'sort', $this->integer());
        $this->dropColumn('article_section_block_item', 'order_num');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('article_section_block_item', 'order_num', $this->integer());
        $this->dropColumn('article_section_block_item', 'sort');
    }
}
