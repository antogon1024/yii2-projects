<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
///echo Yii::t('forms', 'The file "{file}" is too big. Its size cannot exceed {formattedLimit}.');
//$this->registerJsFile('/web/js/mod_cabinet/jquery.min.js');
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($model, 'string1')->textInput(array('value' => 'asd')); ?>
<?= $form->field($model, 'string2') ?>


<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'comparePassword1')->passwordInput() ?>
<?= $form->field($model, 'comparePassword2')->passwordInput() ?>

<?= $form->field($model, 'age')->textInput(array('placeholder' => 'проверяет, что возраст больше или равен 30')); ?>

<?= $form->field($model, 'avatar')->fileInput(); ?>

<?//= $form->field($model, 'date1') // не работает?>
<?//= $form->field($model, 'default_value') ?>



    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>