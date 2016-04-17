<?php 
namespace backend\models;

use yii\base\Model;

class MenuModel extends Model{
	public $parent_id;
	public $name;

	public static function add($data){
		return \Yii::$app->db->createCommand()
			->insert('oa_menu', $data)
			->execute();	
	}

	public static function get($fields = false, $where = false, $group_by = false, $order_by = false, $limit = false){
		if(! $fields){
			$fields = 'menu_id, name, parent_id, added_time';
		}
		$sql = 'select ' . $fields . ' from oa_menu';
		return \Yii::$app->db->createCommand($sql)
			->queryAll();
	}

	public static function deleteById($menu_id){
		if(! $menu_id){
 			return false;
		}
		return \Yii::$app->db->createCommand()
			->delete('oa_menu', 'menu_id = ' . intval($menu_id))
			->execute();
	}
}

