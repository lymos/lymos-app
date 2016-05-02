<?php
/**
 * project class
 */
namespace backend\controllers;

use yii\web\Controller;
use backend\models\ProjectModel;

class ProjectController extends Controller{

	public function actionIndex(){
		$model = new ProjectModel();
		return $this->render('projectList',
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

