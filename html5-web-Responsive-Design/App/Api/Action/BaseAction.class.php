<?php

namespace Api\Action;

use Think\Action;

class BaseAction extends Action {

    public $input_data;
    public $agent_id;
    public $message;

    public function __construct() {
        parent::__construct();

        $this->input_data = file_get_contents('php://input');
    }

    /**
      +----------------------------------------------------------
     * Json转换成数组
      +----------------------------------------------------------
     */
    protected function jsonDecode($response) {
        return json_decode($response, true);
    }

    /**
      +----------------------------------------------------------
     * 数组转换成json
      +----------------------------------------------------------
     */
    protected function jsonEncode($data) {
        return $this->JSON($data);
    }

    /**
      +----------------------------------------------------------
     * 取得错误讯息
      +----------------------------------------------------------
     */
    protected function getMessage($code, $message, $parameter = '') {
        if ($code) {
            $message = array('ACK' => 'SUCCESS', 'Message' => $message);
        } else {
            $message = array('ACK' => 'FAILURE', 'errorMessage' => array('error' => array('message' => $message, 'parameter' => $parameter)));
        }
        $this->message = $this->JSON($message);
        return $this->message;
    }

    /*     * ************************************************************
     *
     * 	使用特定function对数组中所有元素做处理
     * 	@param	string	&$array		要处理的字符串
     * 	@param	string	$function	要执行的函数
     * 	@return boolean	$apply_to_keys_also		是否也应用到key上
     * 	@access public
     *
     * *********************************************************** */

    protected function arrayRecursive(&$array, $function) {
        static $recursive_counter = 0;
        if (++$recursive_counter > 1000) {
            die('possible deep recursion attack');
        }
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $this->arrayRecursive($array[$key], $function);
            } else {
                $array[$key] = $function($value);
            }
        }
        $recursive_counter--;
    }

    /*     * ************************************************************
     *
     * 	将数组转换为JSON字符串（兼容中文）
     * 	@param	array	$array		要转换的数组
     * 	@return string		转换得到的json字符串
     * 	@access public
     *
     * *********************************************************** */

    protected function JSON($array) {
        $this->arrayRecursive($array, 'urlencode');
        $json = json_encode($array);
        return urldecode($json);
    }

    protected function sign($send_data) {
        $dataArray = array(
            "action" => $send_data['action'],
            "data" => $send_data['data'],
            "format" => $send_data['format'],
            "sign_method" => $send_data['sign_method']
        );
        // 获取令牌字符串，并用MD5加密
        $signString = "";
        foreach ($dataArray as $key => $val) {
            if (is_array($val)) {
                $signString .= $key . $this->jsonEncode($val);
            } else {
                $signString .= $key . $val;
            }
        }

        $sign = strtoupper(md5($signString));
        if ($sign != $send_data['sign']) {
            return false;
        } else {
            return true;
        }
    }
    protected function getFile($url,$dir,$type=0){
        if(trim($url)==''){
            return false;
        }
        $urlData = explode('/',$url);
        $filename=end($urlData);
        $save_dir = substr($filename,0,7);
        if(trim($save_dir)==''){
            return false;
        }
        if(0!==strrpos($save_dir,'/')){
            $save_dir.='/';
        }
        //当为1的时候，是公共图片
        $save_dir = ($type)?realpath('./').'/product/'.$dir.'/':realpath('./').'/product/'.$dir.'/'.$save_dir;

        //创建保存目录
        if(!file_exists($save_dir)&&!mkdir($save_dir,0777,true)){
            return false;
        }

        //判断是否存在，存在的话，删除再添加，不存在 直接添加
        if (file_exists($save_dir.$filename)) {
            unlink($save_dir.$filename);
//            return false;
        }

        //获取远程文件所采用的方法
        ob_start();
        readfile($url);
        $content=ob_get_contents();
        ob_end_clean();
        //文件大小
        $fp2=@fopen($save_dir.$filename,'a');
        fwrite($fp2,$content);
        fclose($fp2);
        unset($content,$url);
        return $filename;
    }

    //删除指定目录下的文件及文件夹   当$delDir = FALSE，不删除文件夹 为true时，删除文件夹
    protected function delDirAndFile($path, $delDir = FALSE) {
        $handle = opendir(realpath('./').'/product/'.$path);
        if ($handle) {
            while (false !== ( $item = readdir($handle) )) {
                if ($item != "." && $item != "..")
                    is_dir("$path/$item") ? $this->delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
            }
            closedir($handle);
            if ($delDir)
                return rmdir($path);
        }else {
            if (file_exists($path)) {
                return unlink($path);
            } else {
                return FALSE;
            }
        }
    }
}

?>