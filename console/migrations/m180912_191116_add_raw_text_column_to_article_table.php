<?php

use yii\db\Migration;

/**
 * Handles adding raw_text to table `article`.
 */
class m180912_191116_add_raw_text_column_to_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('article', 'raw_text', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('article', 'raw_text');
    }
}
