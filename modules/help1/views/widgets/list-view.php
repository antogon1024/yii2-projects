<?php
use yii\widgets\ListView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;


echo ListView::widget([
    'dataProvider' => $provider,
    'itemView' => '_list',

    'pager' => [
        'firstPageLabel' => 'Первая',
        'lastPageLabel' => 'Последняя',
        'nextPageLabel' => 'Следующая',
        'prevPageLabel' => 'Предыдущая',
        'maxButtonCount' => 5,
    ],
]);
?>