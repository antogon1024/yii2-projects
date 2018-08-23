<style>
    .action-column{color:red;}
</style>
<?php
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
?>

<!--<h2>Пример</h2>-->
<?php
$data = [
    ['id' => 1, 'name' => ''],
    ['id' => 2, 'name' => 'bcd'],
    ['id' => 3, 'name' => 'cde'],
    ['id' => 4, 'name' => 'dddd'],
    ['id' => 5, 'name' => 'efgg'],
    ['id' => 6, 'name' => 'ffrt'],
    ['id' => 7, 'name' => 'ghtu'],
    ['id' => 8, 'name' => 'hfrt'],
    ['id' => 9, 'name' => 'name 9'],
    ['id' => 10, 'name' => 'name 10'],
    ['id' => 11, 'name' => 'name 11'],
    ['id' => 12, 'name' => 'name 12'],
    ['id' => 13, 'name' => 'name 13'],
    ['id' => 14, 'name' => 'name 14'],
    ['id' => 15, 'name' => 'name 15'],
    ['id' => 16, 'name' => 'name 16'],
    ['id' => 17, 'name' => 'name 17'],
    ['id' => 18, 'name' => 'name 18'],
    ['id' => 19, 'name' => 'name 19'],
    ['id' => 20, 'name' => 'name 20'],
    ['id' => 21, 'name' => 'name 21'],
    ['id' => 22, 'name' => 'name 22'],
    ['id' => 23, 'name' => 'name 23'],
    ['id' => 24, 'name' => 'name 24'],
    ['id' => 25, 'name' => 'name 25'],
    ['id' => 26, 'name' => 'name 26'],
];

$provider = new ArrayDataProvider([
    'allModels' => $data,
    'pagination' => [
        'pageSize' => 3,
        'route' => '/help1/widgets/grid-view/example-1',
        'pageSizeParam' => false,

    ],
    'sort' => [
        'attributes' => ['id', 'name'],
        'route' => '/help1/widgets/grid-view/example-1',
    ],
]);


echo GridView::widget([
    'dataProvider' => $provider,
    'emptyCell' => '-',
    'summary' => false,
    'columns' => [
        //['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'yii\grid\CheckboxColumn',
            // вы можете настроить дополнительные свойства здесь.
        ],

        'id',
        //'parent_id',
        //'name:ntext',
        'name',
        //'url:ntext',
        //'category_image:ntext',
        // 'created_at',
        // 'updated_at',


        [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия',
            'headerOptions' => ['width' => '60', 'class' => 'action-column'],
            'template' => '{view} {update} {delete} {link}',
            'buttons' => [
                'update' => function ($url,$model) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-screenshot"></span>',
                        $url);
                },
                'link' => function ($url,$model,$key) {
                    //return Html::a('<span class="glyphicon glyphicon-screenshot"></span>', $url);
                    return Html::a('<span class="glyphicon glyphicon-screenshot"></span>', $url);
                },
            ],
        ],
    ],
]);

echo 'end';
