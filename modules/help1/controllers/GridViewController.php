<?php

namespace app\modules\help1\controllers;

use Yii;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\modules\help1\models\widgets\provider;




class GridViewController extends Controller
{
	
	public function actionIndex()
    {
		return $this->render('index', [
		]);
	}

	public function actionExample1()
    {
		return $this->render('example-1');
	}

	public function actionExample2()
	{
		$query = provider::find();

		$provider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 2,
				'pageSizeParam' => false,
				'route' => '/help1/widgets/grid-view/example-2',
			],
			'sort' => [
				/*'defaultOrder' => [
					'name' => SORT_DESC,
					'email' => SORT_ASC,
				]*/
			],
		]);

		return $this->render('example-2', ['provider' => $provider]);
	}
}