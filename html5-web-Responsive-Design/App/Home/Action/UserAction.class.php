<?php

namespace Home\Action;

class UserAction extends BaseAction {
    //put your code here

	/**
	 * 获取用户数据
	 */
    public static function getUserData($fields, $where = ''){
    	$model_user = M('users');
    	$data = $model_user
    		->where($where)
    		->getField($fields);
    	return $data;
    }
}

?>
