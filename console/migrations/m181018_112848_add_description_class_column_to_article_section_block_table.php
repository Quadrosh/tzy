<?php

use yii\db\Migration;

/**
 * Handles adding description_class to table `article_section_block`.
 */
class m181018_112848_add_description_class_column_to_article_section_block_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('article_section_block', 'description_class', $this->string());
        $this->addColumn('article_section_block', 'raw_text_class', $this->string());
        $this->addColumn('article_section_block', 'image_class', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('article_section_block', 'description_class');
        $this->dropColumn('article_section_block', 'raw_text_class');
        $this->dropColumn('article_section_block', 'image_class');
    }
}
