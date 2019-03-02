<?php

namespace app\modules\cabinet\controllers;

use Yii;
use yii\web\Controller;
//use app\modules\cabinet\models\clients\RegisterClient;
use app\modules\cabinet\models\Clients;
use app\modules\cabinet\models\clubs\RegisterClub;
use app\modules\cabinet\models\LoginForm;
use yii\web\UploadedFile;

//use app\models\User;
//use app\modules\cabinet\models\User;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        $this->layout = 'empty';
        return $this->render('crossfits');
    }

    public function actionEntry()
    {
        if (!Yii::$app->user->isGuest) {
            $role = Yii::$app->user->identity['role'];
            if ($role == 'admin') {
                return $this->redirect(['/cabinet/clubs']);
            } else if ($role == 'club_admin') {
                return $this->redirect(['/cabinet/clients']);
            } else if ($role == 'client') {
                return $this->redirect(['/cabinet/my-tariff']);
            }
        }

        return $this->render('entry', ['model' => '$model']);
    }

    public function actionLogin()
    {

        $model = new LoginForm();
        $model->load(\Yii::$app->request->post());

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $role = Yii::$app->user->identity['role'];
            if ($role == 'admin') {
                return $this->redirect(['/cabinet/clubs']);
            } else if ($role == 'club_admin') {
                return $this->redirect(['/cabinet/clients']);
            } else if ($role == 'client') {
                return $this->redirect(['/cabinet/my-tariff']);
            }
        } else {
            print_r($model->getErrors());
        }

        exit;
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/cabinet']);
    }

    public function actionRegisterClient()
    {
        $model = new Clients();
        $model->avatar = UploadedFile::getInstance($model, 'avatar');
        $model->load(\Yii::$app->request->post());

        $errors = array();

        if (!$model->validate()) {
            foreach ($model->getErrors() as $key => $value) {
                $errors[$key] = $value[0];
            }

            echo json_encode($errors);
        } else {
            if (!Yii::$app->user->isGuest) {
                // админ редактирует или создает нового клиента
                if (Yii::$app->request->post()['edit'] == 1) {
                    $user_id = Yii::$app->request->post()['user_id'];
                    $model->updateClient($user_id);
                } else {
                    $model->signup();
                }

                // для редиректа в main.js или mclients.js
                echo 'admin';
            } else {
                // регистрируется слиент
                $user = $model->signup();
                Yii::$app->getUser()->login($user);

                // для редиректа в main.js
                echo 'client';
            }
        }

        exit;
    }

    public function actionRegisterClub()
    {
        $model = new RegisterClub();
        $model->load(\Yii::$app->request->post());
        $model->logo = UploadedFile::getInstance($model, 'logo');
        $errors = array();

        if (!$model->validate()) {

            foreach ($model->getErrors() as $key => $value) {
                $errors[$key] = $value[0];
            }

            echo json_encode($errors);

        } else {
            $user = $model->signup();

            if (!Yii::$app->user->isGuest) {
                echo 'admin';
            } else {
                Yii::$app->getUser()->login($user);
                echo 'client';
            }

        }

        exit;
    }

    public function actionTest()
    {
        $model = new Clients();
        $post = $model::findOne(187);
        $post->phone = 3;
        //$post->content = 'Контент';
        //$post->update();

        if ($post->save()) {
            echo "update successful";
        } else {
            echo "update failed";
            //print_r($this->getErrors()) ;
        }

        //echo 22;
        exit;
    }


}
