<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles adding position to table `post`.
 */
class m170615_061942_add_position_column_to_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product', 'visible', Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT 0');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product', 'visible');
    }
}
