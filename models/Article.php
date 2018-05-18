<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property integer $comment_count
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
	        [['text'], 'string'],
	        [['comment_count'], 'integer'],
	        [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'text' => 'Текст',
	        'comment_count' => 'Колличество комментариев'
        ];
    }

	public function create($title, $text){
		$article = new Article();
		$article->title = $title;
		$article->text = $text;
		$article->comment_count = 0;

		return $article->save();

	}
}
