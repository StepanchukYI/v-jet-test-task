<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
?>
<h1>Статьи</h1>


<?php if(count($articles)){foreach ($articles as $article){?>
    <div>
        <div> <?php $article->title?>
        </div>
        <div><?php  $article->text?>
        </div>
        <div><?php $article->comment_count?>
        </div>
    </div>
<?php }}else{ ?>
    <div>
        Статьи не найдены
    </div>
<?php }     ?>