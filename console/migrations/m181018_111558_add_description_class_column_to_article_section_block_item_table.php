<?php

use yii\db\Migration;

/**
 * Handles adding description_class to table `article_section_block_item`.
 */
class m181018_111558_add_description_class_column_to_article_section_block_item_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('article_section_block_item', 'description_class', $this->string());
        $this->addColumn('article_section_block_item', 'text_class', $this->string());
        $this->addColumn('article_section_block_item', 'comment_class', $this->string());
        $this->addColumn('article_section_block_item', 'image_class', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('article_section_block_item', 'description_class');
        $this->dropColumn('article_section_block_item', 'text_class');
        $this->dropColumn('article_section_block_item', 'comment_class');
        $this->dropColumn('article_section_block_item', 'image_class');
    }
}
