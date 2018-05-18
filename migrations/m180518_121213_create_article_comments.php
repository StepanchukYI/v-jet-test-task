<?php

use yii\db\Migration;

/**
 * Class m180518_121213_create_article_comments
 */
class m180518_121213_create_article_comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->createTable('article_comments', [
		    'id' => $this->primaryKey(),
		    'article_id' => $this->integer()->unsigned()->notNull(),
		    'user_name' => $this->string()->notNull(),
		    'text' => $this->text()->notNull(),
	    ]);

//	    // creates index for column `article_id`
//	    $this->createIndex(
//		    'idx-article_comments-article_id',
//		    'article_comments',
//		    'article_id'
//	    );
//
//	    // add foreign key for table `article`
//	    $this->addForeignKey(
//		    'fk-article_comments-article_id',
//		    'article_comments',
//		    'article_id',
//		    'article',
//		    'id',
//		    'CASCADE'
//	    );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    // drops foreign key for table `user`
	    $this->dropForeignKey(
		    'fk-article_comments-article_id',
		    'article_comments'
	    );

	    // drops index for column `author_id`
	    $this->dropIndex(
		    'idx-article_comments-article_id',
		    'article_comments'
	    );

	    $this->dropTable('article_comments');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180518_121213_create_article_comments cannot be reverted.\n";

        return false;
    }
    */
}
