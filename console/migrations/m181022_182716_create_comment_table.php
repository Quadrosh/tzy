<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m181022_182716_create_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(),
            'url'=>$this->string(510),
            'object_type'=>$this->string(255),
            'object_id'=>$this->integer(),
            'name'=>$this->string(255),
            'position'=>$this->string(255),
            'email'=>$this->string(255),
            'contacts'=>$this->string(255),
            'status'=>$this->string(255),
            'text'=>$this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comment');
    }
}
