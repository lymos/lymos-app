<?php
/**
 * property controller
 */
namespace backend\controllers;

use yii\web\Controller;
use backend\models\PropertyModel;

class PropertyController extends Controller{

	public function actionIndex(){
		$model = new PropertyModel();
		return $this->render('propertyList',
					[
						'model' => $model
					]
				);
	}

	public function actionAdd(){
	
	}

	public function actionDelete(){

	}

	public function actionUpdate(){

	}
}

