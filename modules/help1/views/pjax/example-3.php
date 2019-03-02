<?php
use yii\widgets\Pjax;
use yii\widgets\Menu; 
use yii\helpers\Html;
?>

<?= Menu::widget([
	'items' => [
		['label' => 'Обновление серверного времени', 'url' => ['/help1/widgets/pjax/example-1']],
		['label' => 'Автоматическое обновление с интервалом времени', 'url' => ['/help1/widgets/pjax/example-2']],
		['label' => 'Навигация с использованием виджета Pjax', 'url' => ['/help1/widgets/pjax/example-3']],
	],			
]);?>

<?php Pjax::begin(); ?>
    <?= Html::a(
        'Показать время',
        ['/help1/widgets/pjax/example-3?action=time'],
        ['class' => 'btn btn-lg btn-primary']
    ) ?>
    <?= Html::a(
        'Показать дату',
        ['/help1/widgets/pjax/example-3?action=date'],
        ['class' => 'btn btn-lg btn-success']
    ) ?>
    <p>Ответ сервера: <?= $data ?></p>
<?php Pjax::end(); ?>

<h2>Controller</h2>
<?php
$code = '<?php
public function actionExample3($action = \'time\')
{
	if ($action === \'time\') {
		$data = date(\'H:i:s\');
    } else {
		$data = date(\'Y-M-d\');
    }
		
	return $this->render(\'example-3\', [
		\'data\' => $data,
	]);
}
?>';

highlight_string($code);
?> 

<h2>View</h2>
<?php
$code = '
<?php Pjax::begin(); ?>
    <?= Html::a(
        \'Показать время\',
        [\'/help1/widgets/pjax/example-3?action=time\'],
        [\'class\' => \'btn btn-lg btn-primary\']
    ) ?>
    <?= Html::a(
        \'Показать дату\',
        [\'/help1/widgets/pjax/example-3?action=date\'],
        [\'class\' => \'btn btn-lg btn-success\']
    ) ?>
    <p>Ответ сервера: <?= $data ?></p>
<?php Pjax::end(); ?>
';

highlight_string($code);
?> 