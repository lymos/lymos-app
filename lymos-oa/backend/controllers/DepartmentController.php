<?php
/** 
 * department class
 */
namespace backend\controllers;

use yii\web\Controller;
use backend\models\DepartmentModel;

class DepartmentController extends Controller{

	public function actionIndex(){
		$model = new DepartmentModel();
		return $this->render('departmentList',
							[
								'model' => $model,
								'department_list' => [],
								'parent_list' => []
							]
						);
	}

	public function actionAdd(){
		
	}

	public function actionDelete(){

	}

}

