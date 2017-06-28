<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170626_071733_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('reviews', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'data' => Schema::TYPE_DATE,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('reviews');
    }
}
