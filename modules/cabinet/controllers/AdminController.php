<?php
namespace app\modules\cabinet\controllers;

use yii\web\Controller;
use Yii;

use app\modules\cabinet\models\admin\clubs;
//use app\modules\cabinet\models\admin\clients;

use app\modules\cabinet\models\clients;


class AdminController extends Controller
{
    //public $layout = 'cab_layout';

    public function init()
    {
        parent::init();
        //$this->layout = 'cab_layout';
        //echo 'cab-net';exit;
    }

    public function actionClubs()
    {
        $model = new Clubs;
        $data = $model->getData();

        return $this->render('clubs', ['res' => $data,]);
    }

    public function actionClients()
    {
        $model = new Clients;
        $data = $model->getData();

        return $this->render('clients', [
            'data' => $data['data'],
            'filter' => $data['filter'],
            'pages' => $data['pages']
        ]);
    }

    public function actionSearch()
    {
        $request = Yii::$app->request;

        if( $request->isPjax ){
            return $this->render('search', [
                'time' => date('H:i:s').' 111',
            ]);
        }

        $model = new Clients;
        $data = $model->getData();
        $time = date('H:i:s');

        return $this->render('search', ['data' => $data['data'], 'time' => $time]);
       /* return $this->render('search', [
            'time' => date('H:i:s').' 222',
        ]);*/
    }

    public function actionNew()
    {
        //$model = new Clubs;
        //$data = $model->getData();

        return $this->render('newClient');
    }

    public function actionStatistics()
    {
        //$model = new Clubs;
        //$data = $model->getData();

        return $this->render('statistics');
    }

    public function actionPays()
    {
        //$model = new Clubs;
        //$data = $model->getData();

        return $this->render('pays');
    }

    public function actionJournal()
    {
        //$model = new Clubs;
        //$data = $model->getData();

        return $this->render('Journal');
    }

    public function actionTariffs()
    {
        //$model = new Clubs;
        //$data = $model->getData();

        return $this->render('tariffs');
    }

    public function actionQuestions()
    {
        //$model = new Clubs;
        //$data = $model->getData();

        return $this->render('questions');
    }

    public function actionMessages()
    {
        //$model = new Clubs;
        //$data = $model->getData();

        return $this->render('messages');
    }

    public function actionSettings()
    {
        //$model = new Clubs;
        //$data = $model->getData();

        return $this->render('settings');
    }

    public function actionMain()
    {
        //$model = new Clubs;
        //$data = $model->getData();


        return $this->render('main');
    }

    public function actionGetClient()
    {
        /*
        $rules = [
            [
                ['password1', 'password2', 'role', 'full_name1', 'full_name2', 'full_name3', 'username', 'email',
                    'phone', 'avatar'],
                'required', 'message' => 'Поле не должно быть пустым'
            ],

            [
                ['full_name1', 'full_name2', 'full_name3'],
                'match', 'pattern' => '/^[а-я]+$/ui', 'message' => 'Разрешена только кириллица'
            ],

            [
                ['birth_day'],
                'match', 'pattern' => '/^0$/ui', 'message' => 'Не выбран день', 'not' => true
            ],

            [
                ['birth_month'],
                'match', 'pattern' => '/^0$/ui', 'message' => 'Не выбран месяц', 'not' => true
            ],

            [
                ['birth_year'],
                'match', 'pattern' => '/^0$/ui', 'message' => 'Не выбран год', 'not' => true
            ],

            [
                ['username'],
                'match', 'pattern' => '/^[a-z0-9]+$/ui', 'message' => 'Разрешены латинские буквы и цифры'
            ],

            [
                ['email'], 'email', 'message' => 'Неправильный формат email'
            ],

            [
                ['password1'], 'string', 'length' => [4], 'tooShort' => 'Количество символов должно быть больше 5'
            ],

            [
                ['password2'], 'compare', 'compareAttribute' => 'password1', 'message' => 'Пароли не совпадают'
            ],

            [
                ['username'], 'unique', 'message' => 'Поле должно быть уникальным'
            ],

            [
                ['email'], 'unique', 'message' => 'Поле должно быть уникальным'
            ],

            [

                ['avatar'], 'file',
                'extensions' => ['jpg', 'png', 'gif'],
                'maxSize' => 200 * 200,
                'wrongExtension' => 'Разрешены только файлы с этими расширениями: {extensions} .',
                'tooBig' => 'Размер файла не должен превышать {formattedLimit}.',

            ]

        ];

        echo $rules[0][0][0];
        unset($rules[0][0][0]);
        echo '<pre>';print_r($rules);exit;
        */

        $model = new Clients;
        $data = $model->getClient($_GET['id']);
        echo json_encode($data);

        exit;
    }
}
