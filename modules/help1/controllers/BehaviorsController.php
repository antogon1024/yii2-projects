<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10.10.2018
 * Time: 10:03
 */

namespace app\modules\help1\controllers;

use Yii;
use yii\web\Controller;
use yii\log\Logger; //Для динамического прикрепления

use app\modules\help1\models\widgets\Access;
use app\library\Behaviors\MyBehavior;
use app\library\widgets\MyWidget;

class BehaviorsController extends Controller
{
    public function behaviors()
    {
        return [
            // анонимное поведение, прикрепленное по имени класса
            //MyBehavior::className(),

            // именованное поведение, прикрепленное по имени класса
            //'myBehavior2' => MyBehavior::className(),

            // анонимное поведение, сконфигурированное с использованием массива
            [
                'class' => MyBehavior::className(),
                'prop1' => 'Статическое прикрепление поведения в <b>контроллере</b>',
                'prop2' => 'value2',
            ],

            // именованное поведение, сконфигурированное с использованием массива
            /*'myBehavior4' => [
                'class' => MyBehavior::className(),
                'prop1' => 'value1',
                'prop2' => 'value2',
            ]*/
        ];
    }

    public function actionExample1()
    {
        $model = new BlogArticles;
        //echo '<pre>';
        //print_r($this);
        //exit;
        //$model->behaviors();
        $t = '';
        if ($_POST) {
            //echo $_POST['BlogArticles']['name'];exit;
            //echo '<pre>';
            //print_r($_POST);
            //exit;
            $t = $_POST['BlogArticles']['name'];
        }


        return $this->render('example-1', [
            'model' => $model,
            't' => $t,
        ]);
    }

    public function actionExample2()
    {


        $t1 = $this->prop1;
        $t2 = $this->prop2;

        $model = new Access;
        $t3 = $model->prop1;

        $component = new MyWidget;
        $t4 = $component->prop1;

        $component = new Logger();
        $component->attachBehavior('myBehavior', new MyBehavior);
        $t5 = $component->prop1;
        //exit;


        return $this->render('example-2', [
            //'model' => $model,
            't1' => $t1,
            't2' => $t2,
            't3' => $t3,
            't4' => $t4,

            't5' => $t5,
           // 't6' => $t6,
        ]);
    }
}