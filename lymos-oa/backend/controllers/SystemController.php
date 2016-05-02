<?php
/**
 * system controller
 */
namespace backend\controllers;

use yii\web\Controller;
use backend\models\SystemModel;

class SystemController extends Controller{

	public function actionSetting(){
		$model = new SystemModel();
		return $this->render('setting',
					[
						'model' => $model
					]
				);
	}

}
