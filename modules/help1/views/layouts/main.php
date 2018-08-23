<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use yii\widgets\Menu;
use app\library\antogon1024\AntMenu;

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
    <? $this->registerJsFile('/js/site/site.js', ['depends' => [\yii\web\JqueryAsset::className()], 'defer' => 'defer']); ?>
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
            ['label' => 'Help', 'url' => ['/site/help']],
            ['label' => 'Проекты', 'url' => ['/site/projects'], 'items' => [
                ['label' => 'Конвертер валют', 'url' => ['/converter/index']],
                ['label' => 'Динамика курсов валют', 'url' => ['/dinamic-courses/index']],
                ['label' => 'Курсы валют', 'url' => ['/courses-valute/index']],
            ]],
            /*['label' => 'About', 'url' => ['/site/about']],
             ['label' => 'Contact', 'url' => ['/site/contact']],*/
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

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="row">
            <div class="col-md-4">

                <?= AntMenu::widget([
                    'items' => [
                        ['label' => 'Поведения', 'url' => ['/help1/behaviors'], 'items' => [
                            ['label' => 'Пример 1', 'url' => ['/help1/behaviors/example-1']],
                            ['label' => 'Пример 2', 'url' => ['/help1/behaviors/example-2']],
                        ]],
                        ['label' => 'Работа с формами', 'url' => ['/help1/forms']],
                        ['label' => 'Bootstrap-css'
, 'url' => ['/help1/bootstrap']],

                        ['label' => 'Кэширование', 'url' => ['/help1/caching'], 'items' => [
                            ['label' => 'Кэширование данных', 'url' => ['/help1/caching/data']],
                            ['label' => 'Кэширование страниц', 'url' => ['/help1/caching/fragment']],
                        ]],

                        ['label' => 'Виджеты', 'url' => ['/help1/widgets'], 'items' => [
                            ['label' => 'Pjax', 'url' => ['/help1/widgets/pjax'], 'items' => [
                                ['label' => 'Пример 1', 'url' => ['/help1/widgets/pjax/example-1']],
                                ['label' => 'Пример 2', 'url' => ['/help1/widgets/pjax/example-2']],
                                ['label' => 'Пример 3', 'url' => ['/help1/widgets/pjax/example-3']],
                            ]],

                            ['label' => 'GridView', 'url' => ['/help1/widgets/grid-view'], 'items' => [
                                ['label' => 'ArrayDataProvider', 'url' => ['/help1/widgets/grid-view/example-1']],
                                ['label' => 'ActiveDataProvider', 'url' => ['/help1/widgets/grid-view/example-2']],
                            ]],

                            ['label' => 'ListView', 'url' => ['/help1/widgets/list-view']],
                        ]],
                    ],

                    'options' => [
                        'id' => 'helpid',
                    ],
                    'activateParents' => 'true',
                ]); ?>


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
