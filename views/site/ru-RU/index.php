<?php
//use yii\grid\GridView;
//use yii\data\ArrayDataProvider;
/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'My Yii Application';
echo Url::to(['post/view', 'id' => 100, 'a'=>'asd'] ); //exit;
///echo Url::to(['post/view', 'id' => 100, 'a'=>'asd'] ); //exit;

?>
русский






<div class="site-index">

    <div class="jumbotron">
        <h1>Поздравления!</h1>

        <p class="lead">Вы успешно создали приложение Yii.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Начало работы с Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Заголовок</h2>

                <p>Yii – это универсальный фреймворк, что означает, что ее можно использовать для разработки всех видов веб-приложений с использованием PHP. Благодаря своей компонентной архитектуре и сложной поддержке кеширования она особенно подходит для разработки крупномасштабных приложений, таких как порталы, форумы, системы управления контентом (CMS), проекты электронной коммерции, веб-сервисы RESTful и т.д.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Документация &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Заголовок</h2>

                <p>Yii – это универсальный фреймворк, что означает, что ее можно использовать для разработки всех видов веб-приложений с использованием PHP. Благодаря своей компонентной архитектуре и сложной поддержке кеширования она особенно подходит для разработки крупномасштабных приложений, таких как порталы, форумы, системы управления контентом (CMS), проекты электронной коммерции, веб-сервисы RESTful и т.д.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Форум &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Заголовок</h2>

                <p>Yii – это универсальный фреймворк, что означает, что ее можно использовать для разработки всех видов веб-приложений с использованием PHP. Благодаря своей компонентной архитектуре и сложной поддержке кеширования она особенно подходит для разработки крупномасштабных приложений, таких как порталы, форумы, системы управления контентом (CMS), проекты электронной коммерции, веб-сервисы RESTful и т.д.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Расширения &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
