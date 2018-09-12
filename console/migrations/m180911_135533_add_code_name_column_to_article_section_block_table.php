<?php

use yii\db\Migration;

/**
 * Handles adding code_name to table `article_section_block`.
 */
class m180911_135533_add_code_name_column_to_article_section_block_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('article_section_block', 'code_name', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('article_section_block', 'code_name');
    }
}
