<?php

use yii\db\Migration;

/**
 * Handles adding description_class to table `article_section`.
 */
class m181018_113645_add_description_class_column_to_article_section_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('article_section', 'description_class', $this->string());
        $this->addColumn('article_section', 'raw_text_class', $this->string());
        $this->addColumn('article_section', 'image_class', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('article_section', 'description_class');
        $this->dropColumn('article_section', 'raw_text_class');
        $this->dropColumn('article_section', 'image_class');
    }
}
