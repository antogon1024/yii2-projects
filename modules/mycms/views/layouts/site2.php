<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MycmsAsset;

MycmsAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
	
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/']],
			['label' => 'Admin', 'url' => ['/mycms/admin']],
			//['label' => 'Войти', 'url' => ['/mycms/default/login']],
			//['label' => 'Регистрация', 'url' => ['/mycms/default/register']],
            
           Yii::$app->user->isGuest ? (['label' => 'Регистрация', 'url' => ['/mycms/register']]) : (''),
		   Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/mycms/login']]
				
			) : (
                '<li>'
                . Html::beginForm(['/mycms/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
	//echo $id = Yii::$app->user->id.'aaa';exit;
	//echo Yii::$app->user->identity->username;
    ?>

   <!-- <div class="container">
        <?//= Breadcrumbs::widget([
            //'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        //]) ?>
        <?//= $content ?>aaaaaaaaaaaaaaaaaaaaaaaaaa
    </div> -->
	<div id="main-container" class="container">
		<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
		<!-- md  xs sm lg-->
		<div id="main-row" class="row" style="background:green;height:100%;">   
			<div class="col-sm-4" style="background:#ccc;height:100%;">left</div>
			<div class="col-sm-8" style="background:#aaa"><?= $content ?>right</div>
		</div>
	</div>
	
	
</div>





















<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
