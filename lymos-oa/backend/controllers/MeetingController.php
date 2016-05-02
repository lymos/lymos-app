<?php
/**
 * meeting controller
 */
namespace backend\controllers;

use yii\web\Controller;
use backend\models\MeetingModel;

class MeetingController extends Controller{

	public function actionIndex(){
		$model = new MeetingModel();
		return $this->render('meetingList', 
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

