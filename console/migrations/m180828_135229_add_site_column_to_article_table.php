<?php

use yii\db\Migration;

/**
 * Handles adding site to table `article`.
 */
class m180828_135229_add_site_column_to_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('article', 'site', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('article', 'site');
    }
}
