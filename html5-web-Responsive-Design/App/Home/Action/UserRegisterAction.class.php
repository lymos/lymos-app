<?php

namespace Home\Action;

use Think\Action;
use Home\Common\Email;
use Home\Common\GoogleLogin;
use Home\Common\FaceBookLogin;

class UserRegisterAction extends BaseAction {

    public function test() {
        echo 'ok';
    }

    //登录
    public function login() {
        $login_url = self::getOtherLoginUrl();
        $this->assign('google_login_url', $login_url['gg_login_url']);
        $this->assign('fb_login_url', $login_url['fb_login_url']);
        $this->display('login');
    }

    public function logout() {
        session(null);
        header('location:/');
        //echo "<script>location.replace(document.referrer);</script>";
        //$this->success('退出登录成功...', U('Index/index'));
    }

    public function googleLogin() {
        $params = I('get.');
        $obj = new \Home\Common\GoogleLogin(GOOGLE_AKEY, GOOGLE_SKEY);
        if (isset($params['code'])) {
            $keys = array();
            $keys['code'] = $params['code'];
            $keys['redirect_uri'] = GOOGLE_CALLBACK_URL;
            try {
                $token = $obj->getAccessToken('code', $keys);
            } catch (\Home\Common\OAuthException $e) {

            }
        }
        if ($token['access_token']) {
            $user_info = $obj->get('https://www.googleapis.com/plus/v1/people/me', array('access_token' => $token['access_token']));
        }
        if ($user_info) {
            $email = $user_info['emails'][0]['value'];
            $model_user = M('users');
            if (!$user_old = $model_user->where(array('user_email' => $email))->field('user_id,user_email,user_fullname')->find()) {
                if ($user_info['gender'] == 'male') {
                    $gender = 1;
                } else {
                    $gender = 2;
                }
                $email_token = md5(md5($email) . rand(1000, 9999));
                $user_data = array(
                    'user_email' => $email,
                    'user_fullname' => $user_info['displayName'],
                    'user_gender' => $gender,
                    'user_email_token' => $email_token,
                    'user_registed_date' => date('Y-m-d H:i:s'),
                    'user_password' => $email_token
                );
                if ($id = $model_user->add($user_data)) {
                    session('userid', $id);
                    session('useremail', $email);
                    session('username', $user_info['displayName']);
                    //$this->success(L('LOGIN_SUCCESS'), '/');
                    return $this->redirect('/');
                }
            } else {
                session('userid', $user_old['user_id']);
                session('useremail', $user_old['user_email']);
                session('username', $user_old['user_fullname']);
                //$this->success(L('LOGIN_SUCCESS'), '/');
                return $this->redirect('/');
            }
        } else {
            //$this->error(L('LOGIN_FAILED'), '/login.html');
            return $this->redirect('/login.html');
        }
    }

    public function facebookLogin() {
        $params = I('get.');
        $obj = new \Home\Common\FaceBookLogin(FB_AKEY, FB_SKEY);
        if (isset($params['code'])) {
            $keys = array();
            $keys['code'] = $params['code'];
            $keys['redirect_uri'] = FB_CALLBACK_URL;
            try {
                $token = $obj->getAccessToken('code', $keys);
            } catch (\Home\Common\OAuthExceptionFb $e) {

            }
        }

        if ($token['access_token']) {
            $user_info = $obj->get('https://graph.facebook.com/me', array('access_token' => $token['access_token']));
        }

        if ($user_info) {
            $email = $user_info['id'];
            $model_user = M('users');
            if (!$user_old = $model_user->where(array('user_email' => $email))->field('user_id,user_email,user_fullname')->find()) {      
                $email_token = md5(md5($email) . rand(1000, 9999));
                $user_data = array(
                    'user_email' => $email,
                    'user_fullname' => $user_info['name'],
                    'user_email_token' => $email_token,
                    'user_registed_date' => date('Y-m-d H:i:s'),
                    'user_password' => $email_token
                );
                if ($id = $model_user->add($user_data)) {
                    session('userid', $id);
                    session('useremail', $email);
                    session('username', $user_info['name']);
                    //return $this->success(L('LOGIN_SUCCESS'), '/');
                    return $this->redirect('/');
                }
            } else {
                session('userid', $user_old['user_id']);
                session('useremail', $user_old['user_email']);
                session('username', $user_old['user_fullname']);
                //return $this->success(L('LOGIN_SUCCESS'), '/');
                return $this->redirect('/');
            }
        } else {
            //return $this->error(L('LOGIN_FAILED'), '/login.html');
            return $this->redirect('/login.html');
        }
    }

    public function getCaptcha() {
        $config = array(
            'fontSize' => 20,
            'length' => 4,
            'useNoise' => true
        );
        $verify = new \Think\Verify($config);
        $verify->entry();
    }

    private static function getOtherLoginUrl() {
        $data = array();
        $obj_gg = new \Home\Common\GoogleLogin(GOOGLE_AKEY, GOOGLE_SKEY);
        $data['gg_login_url'] = $obj_gg->getAuthorizeURL(GOOGLE_CALLBACK_URL);
        $obj_fb = new \Home\Common\FaceBookLogin(FB_AKEY, FB_SKEY);
        $data['fb_login_url'] = $obj_fb->getAuthorizeURL(FB_CALLBACK_URL);
        return $data;
    }

    //注册
    public function register() {
        $login_url = self::getOtherLoginUrl();
        $this->assign('country_data', $this->getCountryList());
        $this->assign('google_login_url', $login_url['gg_login_url']);
        $this->assign('fb_login_url', $login_url['fb_login_url']);
        $this->display('register');
    }

    public function resetPassword() {
        $this->display('reset_password');
    }

    /**
     * 重置密码操作
     */
    public function actionResetPassword() {
        $params = I('post.');
        $email = $params['email'];
        $token = M('users')->where(array('user_email' => $email))->getField('user_email_token');
        if (!$token) {
            return $this->error('请填入正确的Email地址');
        }
        $content = '<p>点击一下链接进行密码重置</p><p><a target="_blank" href="http://womdee.com/userRegister/resetMyPwd/token/' . $token . '">重置密码</a></p>';
        if ($this->sendEmail($email, 'Womdee Reset User Password', $content)) {
            return $this->registerSuccess($email, 'reset_password');
        }
    }

    public function resetMyPwd($token) {
        $this->assign('token', $token);
        $this->display('reset_mypass');
    }

    public function actionResetMyPass() {
        $params = I('post.');
        $token = $params['token'];
        if ($params['password'] != $params['re_password']) {
            return $this->error('两次密码不一致');
        }
        if (M('users')->where(array('user_email_token' => $token))->setField('user_password', md5(md5($params['password'])))) {
            return $this->success('密码重置成功！', '/login');
        } else {
            return $this->error('密码重置失败！', '/login');
        }
    }

    /**
     * 验证持久登录 md5(token + user_email)
     */
    public function checkLongLogin() {
        /*
          $auth = cookie('_auth');
          $auth_ar = explode('&', $auth);
          $user_email = $auth_ar[1];
          $data = M('users')->where(array('user_email' => $user_email))->field('user_email_token,user_id')->find();
          if(! $data){
          return false;
          }else{
          // 验证成功
          if(md5($data['user_email_token'] . $user_email) == $auth_ar[0]){

          }
          }
         */
    }

    public function checkLogin() {
        $params = I('post.');
        $refer = $params['refer'];
        $username = $params['username'];
        $password = $params['password'];
        if ($username) {
            $pwd_ar = M('users')->where(array('user_email' => $username))->field('user_id,user_password,user_account_status,user_email_token,user_fullname')->find();

            if ($pwd_ar) {
                if (md5(md5($password)) == $pwd_ar['user_password']) {
                    if ($pwd_ar['user_account_status'] == 0) {
                        session('useremail', $username);
                        session('userid', $pwd_ar['user_id']);
                        session('username', $pwd_ar['user_fullname']);
                        if ($params['remember'] == 'on') {
                            cookie('_auth', md5($pwd_ar['user_email_token'] . $username) . '&' . $username, C('COOKIE_EXPIRE'));
                        }
                        if($refer){
                            return $this->redirect(substr($refer, 0, -5));
                        }else{
                            return $this->redirect('/');
                        }
                        
                        //return $this->redirect('UserRegister/registerSuccess', array('mail' => $username, 'refer' => 'login'));
                    } else {
                        session('useremail', $username);
                        session('userid', $pwd_ar['user_id']);
                        session('username', $pwd_ar['user_fullname']);
                        if ($params['remember'] == 'on') {
                            cookie('_auth', md5($pwd_ar['user_email_token'] . $username) . '&' . $username, C('COOKIE_EXPIRE'));
                        }
                        if($refer){
                            return $this->redirect(substr($refer, 0, -5));
                        }else{
                            return $this->redirect('/');
                        }
                    }
                } else {
                    //$this->error('密码错误');
                    header('Content-Type: text/html; charset=utf-8');
                    exit('<script>alert("密码错误"); location.href="login.html";</script>');
                }
            } else {
                //$this->error('用户名错误');
                header('Content-Type: text/html; charset=utf-8');
                exit('<script>alert("用户名错误"); location.href="login.html";</script>');
            }
        } else {
            //$this->error('用户名不能为空');
            header('Content-Type: text/html; charset=utf-8');
            exit('<script>alert("用户名不能为空"); location.href="login.html";</script>');
        }
    }

    /**
     * 检查用户是否已注册
     */
    public function checkUserExists() {
        $params = I('post.');
        if (!$params['email']) {
            return $this->ajaxReturn(array('status' => false, 'data' => 'no data'));
        }
        $ret = M('users')->where(array('user_email' => $params['email']))->getField('user_id');
        if ($ret) {
            return $this->ajaxReturn(array('status' => true, 'data' => 'this email is exists'));
        } else {
            return $this->ajaxReturn(array('status' => false, 'data' => 'no data'));
        }
    }

    public function doRegister() {
        $params = I('post.');

        $verify = new \Think\Verify();
        $status = $verify->check($params['captcha']);
        if (!$status) {
            // return $this->error(L('ERROR_CAPTCHA'));
        }

        if (!trim($params['email'])) {
            return $this->error(L('NOTNULL_EMAIL'));
        }
        if ($params['sex']) {
            $gender = 1;
        } else {
            $gender = 2;
        }
        $user_birthday = addslashes($params['birthday_year'] . '-' . $params['birthday_month']);
        $user_email_token = md5(md5($params['email'])) . rand(1000, 9999);
        $data = array(
            'user_email' => addslashes($params['email']),
            'user_fullname' => addslashes($params['username']),
            'user_password' => md5(md5(addslashes($params['password']))),
            'user_gender' => $gender,
            'user_birthday' => $user_birthday,
            'user_location' => $params['country'],
            'user_registed_date' => date('Y-m-d H:i:s'),
            'user_email_token' => $user_email_token
        );
        $ret = M('users')->add($data);
        if ($ret) {
            $content = '<p>点击一下链接进行账号激活</p><p><a target="_blank" href="http://womdee.com/userRegister/activeAccount/token/' . $user_email_token . '">激活账号</a></p>';

           // $this->sendEmail($params['email'], 'Womdee Active Your Account', $content);
            header('Content-Type: text/html; charset=utf-8');
            session('userid', $ret);
            session('username', $params['username']);
            session('useremail', $params['email']);
            exit('<script>alert("注册成功"); location.href="/index.html";</script>');
            //return $this->success('注册成功!', 'registerSuccess/mail/' . $params['email']);
        } else {
            header('Content-Type: text/html; charset=utf-8');
            exit('<script>alert("注册失败"); location.href="register.html";</script>');
            //return $this->error('注册失败!');
        }
    }

    protected function sendEmail($email, $object, $body, $is_html = true) {
        return \Home\Common\Email::sendEmail($email, $object, $body, $is_html);
    }

    public function registerSuccess($mail, $refer = false) {
        $this->assign('mail_host', getMailUrlByEmail($mail));
        $this->assign('refer', $refer);
        $this->display('registerSuccess');
    }

    /**
     * 激活账号
     */
    public function activeAccount($token) {
        $model = M('users');
        if ($model->where(array('user_email_token' => $token, 'user_account_status' => 0))->getField('user_id')) {

            if ($model->where(array('user_email_token' => $token))->setField('user_account_status', 1)) {
                return $this->success('账号激活成功！', '/login');
            } else {
                return $this->error('账号激活失败！请重新注册！', 'register');
            }
        } else {
            return $this->error('账号激活失败！', 'register');
        }
    }

}

?>