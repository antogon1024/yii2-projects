<?php
namespace app\modules\help1\controllers;

use Yii;
use yii\web\Controller;
use app\modules\help1\models\widgets\access;
use app\modules\help1\models\widgets\news;

use yii\data\ActiveDataProvider;

class WidgetsController extends Controller
{
	public function actionIndex()
    {
		return $this->render('index', [
			
		]);
	}
	
	public function actionPjax()
    {
		//exit;////////////////////////////////////////////////
		return $this->render('pjax', [
			
		]);
	}

	public function actionGridView()
    {
		$model = new Access;
		$data = $model->getData();

		return $this->render('grid-view', [
			'ar' => $data
		]);
	}

	public function actionListView()
	{
		//$model = new News;
		//$data = $model->getData();
		$query = news::find();

		$provider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 2,
				'pageSizeParam' => false,
				'route' => '/help1/widgets/list-view',
			],
			'sort' => [
				/*'defaultOrder' => [
					'name' => SORT_DESC,
					'email' => SORT_ASC,
				]*/
			],
		]);

		return $this->render('list-view', [
			'provider' => $provider
		]);
	}
}