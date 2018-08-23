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
        'brandLabel' => 'Админ-панель',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Меню', 'url' => ['/#'], 'items'=>[
				['label' => 'Все меню', 'url' => ['/mycms/admin/menu/all-menu']],
				['label' => 'Создать меню', 'url' => ['/mycms/admin/menu/add-menu']],
				['label' => 'Пункты меню', 'url' => ['/mycms/admin/menu/item-menu']],
				['label' => 'Создать пункт меню', 'url' => ['/mycms/admin/menu/add-item']],
			]],
			
		
            //Yii::$app->user->isGuest ? (
               // ['label' => 'Login', 'url' => ['/site/login']]
           // ) : (
                '<li>'
                . Html::beginForm(['/mycms/admin/admin/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            //)
        ],
    ]);
    NavBar::end();
    ?>
	<?= $content ?>
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
