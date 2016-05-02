<?php
/**
 * leave class 
 */
namespace backend\controllers;

use yii\web\Controller;
use backend\models\LeaveModel;

class LeaveController extends Controller{

	public function actionIndex(){
		$model = new LeaveModel();
		return $this->render('leaveList',
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

