<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\StringHelper;
?>

<div class="news-item">
    <h2><?= Html::encode($model->header) ?></h2>
    <?//= HtmlPurifier::process(StringHelper::truncate($model->text, 400)) ?>
    <?//= HtmlPurifier::process( StringHelper::explode($model->text, '<br>') ) ?>
    <?= StringHelper::explode($model->text, '<br>')[0] ?>
</div>