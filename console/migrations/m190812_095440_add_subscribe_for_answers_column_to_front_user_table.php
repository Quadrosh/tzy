<?php

use yii\db\Migration;

/**
 * Handles adding subscribe_for_answers to table `front_user`.
 */
class m190812_095440_add_subscribe_for_answers_column_to_front_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('front_user', 'subscribe_for_answers', $this->integer());
        $this->addColumn('front_user', 'email_status', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('front_user', 'subscribe_for_answers');
        $this->dropColumn('front_user', 'email_status');
    }
}
