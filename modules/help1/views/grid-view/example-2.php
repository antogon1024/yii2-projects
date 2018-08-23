<style>
    .edit{margin-right: 10px;}
</style>
<p>example-2</p>

<?php
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;


echo GridView::widget([
    'dataProvider' => $provider,
    //'emptyCell' => '-',
    'summary' => false,
    'columns' => [

        [
            'class' => 'yii\grid\CheckboxColumn',
            // вы можете настроить дополнительные свойства здесь.
        ],

        'id',

        'name',
        'email',

        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Действия',
            //'headerOptions' => ['width' => '60', 'class' => 'action-column'],
            'template' => '{edit}{delete}',
            //'route' => '/help1/widgets/grid-view/edit',
            'buttons' => [

                'edit' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                        'title' =>'Редактировать',
                        'class' =>'edit',
                    ]);
                },
                'delete' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'title' => 'Удалить',
                        'data-confirm' => "Хотите удалить?",
                        //'data-pjax' => true
                    ]);
                },
            ],

            'urlCreator'=>function($action, $model){
                return \yii\helpers\Url::to(['help1/widgets/grid-view/'.$action, 'id'=>$model->id]);
            }
        ],
    ],
]);

