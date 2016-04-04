<?php
/**
 * index controller
 */
namespace backend\controllers;

use yii\web\Controller;
use backend\models\MenuModel;

class IndexController extends Controller{

	public function actionIndex(){
		return $this->render('index');
	}

	public function actionAddmenu(){
		$model = new MenuModel();
		return $this->render('menuEdit', ['model' => $model]);
	}


}

