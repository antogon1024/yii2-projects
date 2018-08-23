<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CbExchangeRates */
/* @var $form ActiveForm */
?>
<div class="test">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'usd') ?>
        <?= $form->field($model, 'eur') ?>
        <?= $form->field($model, 'nok') ?>
        <?= $form->field($model, 'date') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- test -->
