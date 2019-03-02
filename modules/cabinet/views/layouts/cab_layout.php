<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\CabinetAsset;

//CabinetAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <link rel="shortcut icon" href="/web/favicon.ico" type="image/x-icon"/>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->registerCssFile("@web/css/mod_cabinet/yoo_theme.css") ?>
        <?php $this->registerCssFile("@web/css/mod_cabinet/main.css") ?>

        <?php $this->head() ?>
    </head>


    <body class="tm-noblog  tm-navbar-fixed">
    <?php $this->beginBody() ?>

    <div class="uk-container uk-container-center tm-container">
        <div class="uk-sticky-placeholder" style="height: 70px;">
            <nav class="tm-navbar" style="margin: 0px;">
                <a class="tm-logo uk-hidden-small" href="http://notice">
                    <div><img src="/images/logo-w.png" alt="" width="223" height="50"></div>
                </a>

                <div class="tm-nav uk-hidden-small">
                    <ul class="uk-navbar-nav uk-hidden-small">
                        <li><a href="/">Home</a></li>
                        <li class="uk-active"><a href="/cabinet">Crossfit</a></li>
                        <li class="uk-active"><a href="/cabinet/entry">Кабинет</a></li>
                    </ul>
                </div>

                <div class="2uk-navbar-flip uk-float-right">
                    <div class="2uk-navbar-content">
                        <ul id="ant-oauth">
                            <?php if (Yii::$app->user->isGuest): ?>
                                <li><a href="#" class="acm-login ant-btn ant-btn-primary">Войти</a></li>
                                <li><a href="#" class="acm-register ant-btn ant-btn-primary">Регистрация</a></li>
                            <?php else : ?>
                                <li><a href="/cabinet/logout" class="acm-logout ant-btn ant-btn-primary">Выйти</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div id="tm-main" class="tm-block-main uk-block-default tm-padding-around">
            <div class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div class="tm-main uk-width-medium-1-1 uk-row-first">
                    <main class="tm-content">
                        <div id="system-message-container"></div>
                        <div class="uk-grid">

                            <?= $content ?>

                        </div>
                    </main>
                </div>
            </div>
        </div>


        <footer class="tm-footer">
            <div class="uk-grid"></div>
            <div class="uk-flex uk-flex-center">
                <a class="tm-totop-scroller" data-uk-smooth-scroll="" href="#"></a>
            </div>
        </footer>
    </div>


    <?php
    if (Yii::$app->user->isGuest) {
        include __DIR__ . '/_forms.php';
    }

    $this->endBody();
    ?>

    </body>
    </html>
<?php $this->endPage() ?>