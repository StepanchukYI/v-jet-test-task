<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form ActiveForm */
?>

<h1>Создать статью</h1>

<p>
<div class="ArticleCreate">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'title') ?>
	<?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
		<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
	<?php ActiveForm::end(); ?>

</div><!-- ArticleCreate -->
</p>
