<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_comments".
 *
 * @property int $id
 * @property int $article_id
 * @property string $user_name
 * @property string $text
 */
class ArticleComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'user_name', 'text'], 'required'],
            [['article_id'], 'integer'],
            [['text'], 'string'],
            [['user_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'user_name' => 'User Name',
            'text' => 'Text',
        ];
    }

	public function create($article_id,$name, $text){
		$articleComment = new ArticleComment();
		$articleComment->user_name = $name;
		$articleComment->article_id = $article_id;
		$articleComment->text = $text;

		$article = Article::where('id' , $article_id)->findOne();
		$article->comment_count += 1;
		$article->save();


		return $articleComment->save();

	}
}
