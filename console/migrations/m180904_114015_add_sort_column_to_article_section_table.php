<?php

use yii\db\Migration;

/**
 * Handles adding sort to table `article_section`.
 */
class m180904_114015_add_sort_column_to_article_section_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('article_section', 'sort', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('article_section', 'sort');
    }
}
