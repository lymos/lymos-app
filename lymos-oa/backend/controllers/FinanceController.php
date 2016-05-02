<?php
/**
 * finance controller
 */
namespace backend\controllers;

use yii\web\Controller;
use backend\models\FinanceModel;

class FinanceController extends Controller{

	public function actionIndex(){
		$model = new FinanceModel();
		return $this->render('financeList',
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

