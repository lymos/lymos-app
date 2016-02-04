<?php

namespace Home\Action;

class ContactAction extends BaseAction {

    public $help_center_model = '';

    public function __construct() {
        parent::__construct();
        $this->help_center_model = M('help_center');
    }

    //关于我们
    public function aboutUs() {
        $data = $this->help_center_model->where(array('center_type' => 'about_us', 'center_language' => $this->lang))->field('center_title,center_content')->find();

        $this->assign('show_about_us', 'class="hover"');
        $this->assign('data', $data);
        $this->display('about_us');
    }

    //联系我们
    public function contactUs() {
        $data = $this->help_center_model->where(array('center_type' => 'contact_us', 'center_language' => $this->lang))
                ->field('center_title,center_content')
                ->find();

        $this->assign('data', $data);
        $this->assign('show_contact_us', 'class="hover"');
        $this->display();
    }

    public function business() {
        $data = $this->help_center_model->where(array('center_type' => 'buiness', 'center_language' => $this->lang))->field('center_title,center_content')->find();
        //热销产品
        $hot_data = $this->hotOrLikeProductData('hot', 4);

        $this->assign('data', $data);
        $this->assign('hot_data', $hot_data);
        $this->display('business');
    }

    public function actionBusiness() {
        $params = I('post.');
        if (!$params['company_name'] || !$params['email']) {
            return $this->error('公司名称或者邮件不能为空! ');
        }
        $purchase = implode(',', $params['purchase']);

        $data = array(
            'dealer_company_name' => addslashes($params['company_name']),
            'dealer_website' => addslashes($params['website']),
            'dealer_company_address' => addslashes($params['company_address']),
            'dealer_company_type' => addslashes($params['company_type']),
            'dealer_brands' => addslashes($params['products_brands']),
            'dealer_purchase_purpose' => addslashes($purchase),
            'dealer_contact_name' => addslashes($params['contact_name']),
            'dealer_email_address' => addslashes($params['email']),
            'dealer_contact_phone' => addslashes($params['phone_number']),
            'dealer_contact_mobile' => addslashes($params['mobile_phone']),
            'dealer_time' => date('Y-m-d H:i:s')
        );

        if (M('buiness_dealer')->add($data)) {
            $body = '<p>' . $params['company_name'] . '</p>' . '<p>' . $params['website'] . '</p>'
                    . '<p>' . $params['company_address'] . '</p>' . '<p>' . $params['company_type'] . '</p>'
                    . '<p>' . $params['products_brands'] . '</p>' . '<p>' . $purchase . '</p>'
                    . '<p>' . $params['contact_name'] . '<p>' . $params['email'] . '</p>'
                    . '<p>' . $params['phone_number'] . '<p>' . $params['mobile_phone'] . '</p>';
            //self::sendEmail(C('SERVER_EMAIL'), 'Womdee New Comment', $body);
            return $this->success(L('SAVE_SUCCESS'));
        } else {
            return $this->error(L('SAVE_FAILED'));
        }
    }

    protected function sendEmail($email, $object, $body, $is_html = true) {
        return \Home\Common\Email::sendEmail($email, $object, $body, $is_html);
    }

    /**
     * 提交咨询
     */
    public function actionContactInquiries() {
        $contact_us_content_model = M('contact_us_content');
        $params = I();

        $data = array(
            'cact_name' => addslashes($params['name']),
            'cact_company' => addslashes($params['company']),
            'cact_website_url' => addslashes($params['website']),
            'cact_email_address' => addslashes($params['email']),
            'cact_product_interest' => addslashes($params['interest']),
            'cact_comments' => addslashes($params['comment']),
            'cact_userid' => intval(session('user_id')),
            'cact_time' => date('Y-m-d H:i:s'),
            'cact_type' => 1
        );
        unset($params);
        $ret = $contact_us_content_model->add($data);
        if ($ret) {
            $body = '<p>' . $params['name'] . '</p>' . '<p>' . $params['company'] . '</p>'
                    . '<p>' . $params['website'] . '</p>' . '<p>' . $params['email'] . '</p>'
                    . '<p>' . $params['interest'] . '</p>'
                    . '<p>' . $params['comment'] . '<p>' . $params['email'] . '</p>'
                    . '<p>' . date('Y-m-d H:i:s') . '</p>';
            //self::sendEmail(C('SERVER_EMAIL'), 'Womdee New Comment', $body);
            return $this->success(L('SAVE_SUCCESS'));
        } else {
            return $this->error(L('SAVE_FAILED'));
        }
    }

    /**
     * 提交产品意见
     */
    public function actionContactProduct() {
        $contact_us_content_model = M('contact_us_content');
        $params = I();
        $data = array(
            'cact_name' => addslashes($params['name']),
            'cact_company' => addslashes($params['company']),
            'cact_website_url' => addslashes($params['review']),
            'cact_email_address' => addslashes($params['email']),
            'cact_product_interest' => addslashes($params['interest']),
            'cact_hearme_reason' => addslashes($params['hear']),
            'cact_comments' => addslashes($params['comment']),
            'cact_userid' => intval(session('user_id')),
            'cact_time' => date('Y-m-d H:i:s'),
            'cact_type' => 2
        );
        unset($params);
        $ret = $contact_us_content_model->add($data);
        if ($ret) {
            $body = '<p>' . $params['name'] . '</p>' . '<p>' . $params['company'] . '</p>'
                    . '<p>' . $params['website'] . '</p>' . '<p>' . $params['email'] . '</p>'
                    . '<p>' . $params['interest'] . '</p>' . '<p>' . $params['review'] . '</p>'
                    . '<p>' . $params['comment'] . '<p>' . $params['email'] . '</p>'
                    . '<p>' . date('Y-m-d H:i:s') . '</p>';
            //self::sendEmail(C('SERVER_EMAIL'), 'Womdee New Comment', $body);
            return $this->success(L('SAVE_SUCCESS'));
        } else {
            return $this->error(L('SAVE_FAILED'));
        }
    }

}

?>