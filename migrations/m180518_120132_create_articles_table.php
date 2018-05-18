<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m180518_120132_create_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
	        'title' => $this->string()->notNull(),
	        'text' => $this->text()->notNull(),
	        'comment_count' => $this->integer()->defaultValue(0)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article');
    }
}
