<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use yii\widgets\Menu;

AppAsset::register($this);
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
	<? $this->registerJsFile('/js/site/site.js', ['depends' => [\yii\web\JqueryAsset::className()], 'defer'=>'defer']); ?>
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
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
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
            )
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
			<div class="col-md-4">
				<?= Menu::widget([
					'items' => [
					// Important: you need to specify url as 'controller/action',
					// not just as 'controller' even if default action is used.
					['label' => 'Home', 'url' => ['site/index']],
					['label' => 'Bootstrap', 'url' => ['bootstrap/index']],
					['label' => 'Converter', 'url' => ['converter/index']],
					// 'Products' menu item will be selected as long as the route is 'product/index'
					['label' => 'Products', 'url' => ['product/index'], 'items' => [
						['label' => 'New Arrivals', 'url' => ['product/index', 'tag' => 'new']],
						['label' => 'Most Popular', 'url' => ['product/index', 'tag' => 'popular']],
					]],
					['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
					
					['label' => 'Кэширование', 'url' => ['caching/index'], 'items' => [
						['label' => 'Кэширование данных', 'url' => ['caching/data', 'tag' => 'new']],
						['label' => 'Кэширование страниц', 'url' => ['caching/fragment', 'tag' => 'popular']],
					]],
				],
				
				'options' => [
					'id'=>'helpid',
				],
			]);?>
			
			
			
			
			
			
			
				<?
					echo Menu::widget([
    'items' => [
        ['label' => 'Главная', 'url' => ['site/index']],
		['label' => 'О компании', 'url' => ['site/about']],
        ['label' => 'Услуги',
			'url' => ['services/index'],
			'options'=>['class'=>'dropdown'],
			'template' => '<a href="{url}" class="url-class">{label}</a>',
			'items' => [
				['label' => 'Юридические услуги', 'url' => ['services/juridical-services']],
				['label' => 'Оценочные услуги', 'url' => ['services/valuation-services']],
			]
		],
        ['label' => 'Контакты', 'url' => ['site/contacts']]
        
    ],
	'submenuTemplate' => "\n<ul class='dropdown-menu' role='menu'>\n{items}\n</ul>\n",
]);
				?>
			</div>
			<div class="col-md-8"><?= $content ?></div>
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
