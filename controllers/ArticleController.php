<?php

namespace app\controllers;

use app\models\ArticleComment;
use Yii;
use app\models\Article;
use yii\db\Query;

class ArticleController extends \yii\web\Controller
{
	public function actionIndex()
	{
		$articles = Article::find()
		                   ->indexBy('id')
		                   ->all();

		return $this->render( 'index', [
			'articles' => $articles
		] );
	}

	public function actionCreate()
	{
		$model = new Article();
		$model->load( Yii::$app->request->post() );
		if ( $model->load( Yii::$app->request->post() ) && $model->create( $model->title, $model->text ) )
		{

			return $this->refresh();
		}

		return $this->render( 'create', [
			'model' => $model
		] );
	}

	public function actionView($id)
	{
		$article = Article::findOne($id);
		$data['article'] = $article;
		if($article){
 			$model = new ArticleComment();
			if ( $model->load( Yii::$app->request->post() ) && $model->create($article->id, $model->user_name, $model->text ) )
			{
				return $this->refresh();
			}
		}
		if($article->comment_count){
			$data['comments'] = ArticleComment::where('article_id', $article->id)->get();
		}
		return $this->render( 'view', $data );
	}

}
