<?php

namespace app\modules\mycms\controllers;

use yii\web\Controller;
use Yii;
//use common\models\LoginForm;
use app\modules\mycms\models\LoginForm;
use app\modules\mycms\models\SignupForm;


class AdminController extends Controller
{
    public function init()
    {
        //parent::init();
		echo 'adm-contr';exit;
			echo 3;exit;
		exit;
		$this->layout = 'admlogin';
    }
	
	
	//вход в админку
    public function actionIndex()
    {
        /*$auth = Yii::$app->authManager;
        
        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...
        
         // добавляем разрешение "createPost"
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // добавляем разрешение "updatePost"
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // добавляем роль "author" и даём роли разрешение "createPost"
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // добавляем роль "admin" и даём роли разрешение "updatePost"
        // а также все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);*/
		
		
		
		
		
		$model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->redirect(['/mycms/admin/menu/all-menu']);
        } else {
			//return $this->redirect(['/mycms/admin']);
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionLogout()
    {
        Yii::$app->user->logout();
		return $this->redirect(['/mycms/admin']);
        //return $this->goHome();
    }
	
	public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
	
	public function actionAllMenu()
	{
		return $this->render('all-menu');
	}
}
