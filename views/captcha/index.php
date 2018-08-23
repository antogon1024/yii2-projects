<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

?>

<?php $form = ActiveForm::begin(); ?>
<?//= $form->field($model, 'l') ?>
    <?= $form->field($model, 'string1') ?>
	<?= $form->field($model, 'string2') ?>
	
	
    <?= $form->field($model, 'email') ?>
	<?= $form->field($model, 'date1') ?>
	
	<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
        //'captchaAction' => \yii\helpers\Url::toRoute('/help1/forms'),
		'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
    ]) ?>
	
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>