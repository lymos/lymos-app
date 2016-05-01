<?php
/**
 * basic train
 *
 */
namespace common\commonTraits;

trait basicTrait{

	public static $now_time = null;

	public static function getNowTime(){
		if(! self::$now_time){
			self::$now_time = time();
		}
		return self::$now_time;
	}

}


