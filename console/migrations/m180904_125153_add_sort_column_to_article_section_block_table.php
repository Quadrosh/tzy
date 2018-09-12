<?php

use yii\db\Migration;

/**
 * Handles adding sort to table `article_section_block`.
 */
class m180904_125153_add_sort_column_to_article_section_block_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('article_section_block', 'sort', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('article_section_block', 'sort');
    }
}
