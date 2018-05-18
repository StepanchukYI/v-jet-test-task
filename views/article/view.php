<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1><?= Html::encode($article->title) ?></h1>

<p>
	<?= Html::encode($article->text) ?>
</p>

<?php if(isset($comments)){?>
<div class="comments">
    <?php foreach ($comments as $comment){?>
    <p> <?= Html::encode($comment->user_name)?> </p>
    <p><?= Html::encode($comment->text)?></p>
<?php}}?>


<div class="ArticleCommentCreate">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($article->id, 'article_id')->hiddenInput() ?>
	<?= $form->field($model, 'user_name') ?>
	<?= $form->field($model, 'text')->textarea(['rows' => 2]) ?>

    <div class="form-group">
		<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
	<?php ActiveForm::end(); ?>

</div><!-- ArticleCreate -->