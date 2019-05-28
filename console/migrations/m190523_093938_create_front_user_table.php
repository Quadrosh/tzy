<?php

use yii\db\Migration;

/**
 * Handles the creation of table `front_user`.
 */
class m190523_093938_create_front_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('front_user', [
            'id' => $this->primaryKey(),
            'site' => $this->string(255)->notNull(),
            'username' => $this->string(255)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'phone' => $this->string(255),
            'city' => $this->string(255),
            'country' => $this->string(255),
            'address' => $this->string(1000),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('front_user');
    }
}
