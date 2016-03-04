<?php

/** 加密密码 */
function encrypt($pwd) {
    $des = new \Org\Crypt\Des;
    $code = $des->encrypt($pwd, DES_CODE_PREFIX);
    return base64_encode($code);
}

/** 解密密码 */
function decrypt($code) {
    $des = new \Org\Crypt\Des;
    return $des->decrypt(base64_decode($code), DES_CODE_PREFIX);
}

//Curl获取网页内容
function readHtmlWithCurl($url) {
    //$cookie_file = realpath('.') . '/cookie.txt';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);          // timeout 30 seconed
    curl_setopt($ch, CURLOPT_HEADER, false);        // 设定是否显示头信息
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    // 设定返回的数据是否自动显示
    //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file); // 保存返回的 cookie 信息
    //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/13.0.1');
    $result = curl_exec($ch);
    if ($result) {
        curl_close($ch);
        return $result;
    } else {
        curl_close($ch);
        return false;
    }
}

//语言
function get_lang_data($lang = '') {
    $data = array(
        'zh-cn' => array('cn_name' => '中文', 'en_name' => 'cn', 'image' => ''),
        'en-us' => array('cn_name' => '英语', 'en_name' => 'en', 'image' => ''),
        'it-sos' => array('cn_name' => '意大利语', 'en_name' => 'it', 'image' => '')
    );
    if (!empty($lang)) {
        return $data[$lang];
    }
    return $data;
}

//语言颜色
function get_lang_color() {
    return array('Color', 'Farbe');
}

/*
  Utf-8、gb2312都支持的汉字截取函数
  cut_str(字符串, 截取长度, 开始长度, 编码);
  编码默认为 utf-8
  开始长度默认为 0
 */

function cut_str($string, $sublen, $start = 0, $code = 'UTF-8') {
    if ($code == 'UTF-8') {
        $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $string, $t_string);
        if (count($t_string[0]) - $start > $sublen)
            return join('', array_slice($t_string[0], $start, $sublen)) . "..";
        return join('', array_slice($t_string[0], $start, $sublen));
    }else {
        $start = $start * 2;
        $sublen = $sublen * 2;
        $strlen = strlen($string);
        $tmpstr = '';
        for ($i = 0; $i < $strlen; $i++) {
            if ($i >= $start && $i < ($start + $sublen)) {
                if (ord(substr($string, $i, 1)) > 129) {
                    $tmpstr.= substr($string, $i, 2);
                } else {
                    $tmpstr.= substr($string, $i, 1);
                }
            }
            if (ord(substr($string, $i, 1)) > 129)
                $i++;
        }
        if (strlen($tmpstr) < $strlen)
            $tmpstr.= "..";
        return $tmpstr;
    }
}

/**
 * 根据邮箱用户名返回邮箱服务器地址
 * @param string $email
 * @return string
 */
function getMailUrlByEmail($email) {
    if (!$email) {
        return false;
    }
    $ar = explode('@', $email);
    $domain = $ar[1];
    $url = '';
    switch ($domain) {
        case 'gmail.com':
            $url = 'https://gmail.com';
            break;
        case 'aliyun.com':
            $url = 'http://mail.aliyun.com';
            break;
        case '163.com':
            $url = 'http://mail.163.com';
            break;
        case 'qq.com':
            $url = 'http://mail.qq.com';
            break;
        default:
            break;
    }
    return $url;
}

/**
 * 检测设备类型
 */
function checkDeviceType() {
    $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);

    if (strpos($user_agent, 'iphone') || strpos($user_agent, 'android')) {
        return 'mobile';
    }
    if (strpos($user_agent, 'ipad')) {
        return 'ipad';
    }
    return 'pc';
}

//产品链接地址
function product_url($title, $item_id) {
    $title1 = strtolower($title);
    $title2 = str_replace(' ', '-', $title1);
    $title3 = str_replace("&#039;", '', $title2);
    $title4 = strFilter($title3);
    $url = '/' . $title4 . '-p' . $item_id . '.html';
    return $url;
}

function strFilter($str) {
    $str = str_replace('`', '', $str);
    $str = str_replace('·', '', $str);
    $str = str_replace('~', '', $str);
    $str = str_replace('!', '', $str);
    $str = str_replace('！', '', $str);
    $str = str_replace('@', '', $str);
    $str = str_replace('#', '', $str);
    $str = str_replace('$', '', $str);
    $str = str_replace('￥', '', $str);
    $str = str_replace('%', '', $str);
    $str = str_replace('^', '', $str);
    $str = str_replace('……', '', $str);
    $str = str_replace('&', '', $str);
    $str = str_replace('*', '', $str);
    $str = str_replace('(', '', $str);
    $str = str_replace(')', '', $str);
    $str = str_replace('（', '', $str);
    $str = str_replace('）', '', $str);
    $str = str_replace('_', '', $str);
    $str = str_replace('——', '', $str);
    $str = str_replace('+', '', $str);
    $str = str_replace('=', '', $str);
    $str = str_replace('|', '', $str);
    $str = str_replace('\\', '', $str);
    $str = str_replace('[', '', $str);
    $str = str_replace(']', '', $str);
    $str = str_replace('【', '', $str);
    $str = str_replace('】', '', $str);
    $str = str_replace('{', '', $str);
    $str = str_replace('}', '', $str);
    $str = str_replace(';', '', $str);
    $str = str_replace('；', '', $str);
    $str = str_replace(':', '', $str);
    $str = str_replace('：', '', $str);
    $str = str_replace('\'', '', $str);
    $str = str_replace('"', '', $str);
    $str = str_replace('“', '', $str);
    $str = str_replace('”', '', $str);
    $str = str_replace(',', '', $str);
    $str = str_replace('，', '', $str);
    $str = str_replace('<', '', $str);
    $str = str_replace('>', '', $str);
    $str = str_replace('《', '', $str);
    $str = str_replace('》', '', $str);
    $str = str_replace('.', '', $str);
    $str = str_replace('。', '', $str);
    $str = str_replace('/', '', $str);
    $str = str_replace('、', '', $str);
    $str = str_replace('?', '', $str);
    $str = str_replace('？', '', $str);
    return trim($str);
}

function getIPaddress() {

    global $ip;
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else
        $ip = "Unknow";
    return $ip;

    return $_SERVER["REMOTE_ADDR"];
    $IPaddress = '';
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $IPaddress = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $IPaddress = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")) {
            $IPaddress = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {

            $IPaddress = getenv("HTTP_CLIENT_IP");
        } else {
            $IPaddress = getenv("REMOTE_ADDR");
        }
    }

    return $IPaddress;
}

?>