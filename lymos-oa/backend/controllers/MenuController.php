<?php
/**
 * menu controller class
 */
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\MenuModel;

defined('ROOT') or define('ROOT', realpath(dirname(dirname(dirname(__FILE__)))));
Yii::$classMap['common\commonTrait\basicTrait'] = ROOT . '/common/commonTraits/basicTrait.php';

class MenuController extends Controller{
	use \common\commonTraits\basicTrait;	// usage: self::prop/$this->prop 

	public function actionIndex(){
		$menu_list = self::getMenuList();
		$parent_list = ['' => '=select parent='];
		foreach($menu_list as $rs){
			if($rs['parent_id']){
				continue;
			}
			$parent_list[$rs['menu_id']] = $rs['name'];
		}

		$model = new MenuModel();
		return $this->render('menuList', 
					[
						'model' => $model,
						'menu_list' => $menu_list,
						'parent_list' => $parent_list
					]);
	}

	public function actionAdd(){
		$post_data = \Yii::$app->request->post();
		$post_data['MenuModel']['added_time'] = self::getNowTime();
		$ret = MenuModel::add($post_data['MenuModel']);
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;	// 格式成JSON
		if($ret){
			$post_data['MenuModel']['id'] = $ret;
			$response = ['status' => true, 'message' => 'success', 'return_type' => 'list_add', 'data' => $post_data['MenuModel']];
		}else{
			$response = ['status' => false, 'message' => 'failed', 'return_type' => 'list_add'];
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

