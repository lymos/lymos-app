<?php

//静态路由
return array(
    //登录,注册
    'login' => 'UserRegister/login',
    'register' => 'UserRegister/register',
    'userinfo' => 'UserRegister/userinfo',
    'logout' => 'UserRegister/logout',
    'checkUser' => 'UserRegister/checkUserExists', // 检查用户是否已存在
    'reset_password' => 'UserRegister/resetPassword', // 重置密码
    'actionResetPassword' => 'UserRegister/actionResetPassword',
    'registerSuccess' => 'UserRegister/registerSuccess',
    'actionResetMyPass' => 'UserRegister/actionResetMyPass',
    'google-login' => 'UserRegister/googleLogin',
    'facebook-login' => 'UserRegister/facebookLogin',
    // 产品列表
    'productlist' => 'Product/index',
    // 关于我们
    'about-us' => 'Contact/aboutUs',
    'contact-us' => 'Contact/contactUs',
    'business' => 'Contact/business',
    'actionBusiness' => 'Contact/actionBusiness',
);
?>

