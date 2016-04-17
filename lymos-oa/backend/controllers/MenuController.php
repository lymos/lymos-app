<?php
namespace backend\controllers;

use yii\web\Controller;
use backend\models\MenuModel;

class MenuController extends Controller{

	public function actionIndex(){
		$menu_list = self::getMenuList();
		$model = new MenuModel();
		return $this->render('menuList', 
					[
						'model' => $model,
						'menu_list' => $menu_list
					]);
	}

	public function actionAdd(){
		$post_data = \Yii::$app->request->post();
		$ret = MenuModel::add($post_data['MenuModel']);
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;	// 格式成JSON
		if($ret){
			$response = ['status' => true, 'message' => 'success'];
		}else{
			$response = ['status' => false, 'message' => 'failed'];
		}
		return $response;	// return response yii 会进行响应输出
	}

	public static function getMenuList(){
		return MenuModel::get();
		//file_put_contents('/tmp/lymos-oa-debug.log', print_r($temp, true), FILE_APPEND | LOCK_EX);
	}

	public static function actionDeleteItem(){
		$post_data = \Yii::$app->request->post();
		$menu_id = $post_data['MenuModel']['id'];
		$ret = MenuModel::deleteById($menu_id);
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		if($ret){
			$response = ['status' => true, 'message' => 'success'];
		}else{
			$response = ['status' => false, 'message' => 'failed'];
		}
		return $response;
	}
}

