<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use yii\widgets\Menu;

//use yii\helpers\ArrayHelper;
use app\library\antogon1024\AntMenu;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="shortcut icon" href="/web/favicon.ico" type="image/x-icon" />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	<? $this->registerJsFile('/js/site/site.js', ['depends' => [\yii\web\JqueryAsset::className()], 'defer'=>'defer']); ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php 
    NavBar::begin([
        'brandLabel' => 'antogon1024',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
			['label' => 'Home', 'url' => ['/']],
			['label' => 'Help', 'url' => ['/help1']],
			['label' => 'Проекты', 'url' => ['/site/projects'], 'items'=>[
				['label' => 'Конвертер валют', 'url' => ['/converter/index']],
				['label' => 'Динамика курсов валют', 'url' => ['/dinamic-courses/usd']],
				['label' => 'Курсы валют', 'url' => ['/courses-valute/index']],
				['label' => 'CMS', 'url' => ['/mycms']],
                ['label' => 'Личный кабинет', 'url' => ['/cabinet']],
				['label' => 'Доступы', 'url' => ['/access/index']],
			]],
		   //['label' => 'About', 'url' => ['/site/about']],
            //['label' => 'Contact', 'url' => ['/site/contact']],
            
			
			Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
			
			(\Yii::$app->language == 'en-US') ? (
				['label' => 'Рус', 'url' => ['/ru']]
			) : (
				['label' => 'Eng', 'url' => ['/en']]
			)
			
			
			//\Yii::$app->language;
        ],
    ]);
    NavBar::end();
    ?>

   <!-- <div class="container">
        <?//= Breadcrumbs::widget([
            //'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        //]) ?>
        <?//= $content ?>
    </div>-->
	
	
<div class="container">
		<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
	<div class="row">
		<div class="col-md-12"><?= $content ?></div>
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
