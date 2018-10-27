<?php

use yii\db\Migration;

/**
 * Handles adding conclusion to table `article_section_block`.
 */
class m181027_163359_add_conclusion_column_to_article_section_block_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('article_section_block', 'conclusion', $this->text());
        $this->addColumn('article_section_block', 'conclusion_class', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('article_section_block', 'conclusion');
        $this->dropColumn('article_section_block', 'conclusion_class');
    }
}
