<?php 
use yii\widgets\Pjax;
use yii\widgets\Menu; 
use yii\helpers\Html;

$script = <<< JS
$(document).ready(function() {
    setInterval(function(){
        $('#refreshButton').click();
    }, 3000);
});
JS;
$this->registerJs($script);
?>

<?= Menu::widget([
	'items' => [
		['label' => 'Обновление серверного времени', 'url' => ['/help1/widgets/pjax/example-1']],
		['label' => 'Автоматическое обновление с интервалом времени', 'url' => ['/help1/widgets/pjax/example-2']],
		['label' => 'Навигация с использованием виджета Pjax', 'url' => ['/help1/widgets/pjax/example-3']],
	],			
]);?>


<h2>Автоматическое обновление с интервалом времени</h2>

<?php Pjax::begin(); ?>
    <?= Html::a(
    'Обновить',
    ['/help1/widgets/pjax/example-2'],
    ['class' => 'btn btn-lg btn-primary', 'id' => 'refreshButton']
    ) ?>
    <p>Время сервера: <?= $time ?></p>
<?php Pjax::end(); ?>


<h2>Controller</h2>
<?php
$code = '<?php
public function actionPjax1()
{
	$request = Yii::$app->request;
		
	if( $request->isPjax ){
		return $this->render(\'pjax\', [
			\'time\' => date(\'H:i:s\').\' 111\',
		]);
	}
		
	return $this->render(\'pjax_1\', [
		\'time\' => date(\'H:i:s\').\' 222\',
	]);
}
?>';

highlight_string($code);
?> 

<h2>View</h2>
<?php
$code = '
<?php Pjax::begin([\'id\' =>\'asd\']); ?>
    <?= Html::a(
        \'Обновить\',
        [\'/help1/widgets/pjax/example-1\'],
        [\'class\' => \'btn btn-lg btn-primary\']
    ) ?>
    <p>Время сервера: <?= $time ?></p>
<?php Pjax::end(); ?>
';

highlight_string($code);
?> 