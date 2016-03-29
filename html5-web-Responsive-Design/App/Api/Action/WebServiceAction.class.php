<?php

namespace Api\Action;

class WebServiceAction extends WomdeeAPIFunctionAction {

    public function index() {
        $send_data_temp = $this->input_data;
        $send_data = $this->jsonDecode($send_data_temp);
//        print_r($send_data_temp);die();
        //签名验证
        $sign_code = $this->sign($send_data);
        if ($sign_code) {
            $model = $send_data['action'];
            $return_data = $this->$model($send_data['data']);
            print_r($return_data);
        } else {
            die("数据有丢失，请重新传输");
        }
    }

}

