<?php
/**
 * tools controller
 */
namespace backend\controllers;

use yii\web\Controller;

class ToolsController extends Controller{

	public function actionCalendar(){
		return $this->render('calendar');
	}

}

