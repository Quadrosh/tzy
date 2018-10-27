<?php

use yii\db\Migration;

/**
 * Handles adding conclusion to table `article_section`.
 */
class m181027_163434_add_conclusion_column_to_article_section_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('article_section', 'conclusion', $this->text());
        $this->addColumn('article_section', 'conclusion_class', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('article_section', 'conclusion');
        $this->dropColumn('article_section', 'conclusion_class');
    }
}
