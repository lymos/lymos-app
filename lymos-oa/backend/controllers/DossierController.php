<?php
/**
 * dossier class
 */
namespace backend\controllers;

use yii\web\Controller;
use backend\models\DossierModel;

class DossierController extends Controller{

	public function actionIndex(){
		$model = new DossierModel();
		return $this->render('dossierList',
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

