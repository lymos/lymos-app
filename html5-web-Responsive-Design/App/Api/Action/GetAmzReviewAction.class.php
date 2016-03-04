<?php

namespace Api\Action;

use Think\Action;

class GetAmzReviewAction extends Action {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $sites_list_model = M('sites_list');
        $listings_detail_model = M('listings_detail');
        $item_id = $_REQUEST['id'];
        if (empty($item_id)) {
            die('Id Is Empty');
        }

        //站点
        $site_data = $sites_list_model->where('listing_show = 1')->order('listing_site_sort asc')->select();
        //物品
        $listings_detail = $listings_detail_model->field("item_id,asin")->where("sku_status = 1 and asin != '' and item_id = $item_id")->select();
        foreach ($listings_detail as $listings_val) {
            foreach ($site_data as $site_val) {
                $amz_reviewid_array = $this->getReviewOldData($listings_val['asin'], $site_val['listing_site_id']);
                $this->getReviewDataByUs($listings_val, $amz_reviewid_array, $site_val);
            }
        }
    }

    /*
     * 获取已存在评价
     */

    public function getReviewOldData($asin, $site) {
        $review_model = M('reviews');
        $review_id = $review_model->where("review_asin = '$asin' and review_site = $site and type = 2")->getField('review_id,amz_review_id');
        return $review_id;
    }

    /*
     * 获取美国站评论
     */

    public function getReviewDataByUs($listings_val, $amz_reviewid_array, $site_val, $page_number = 1, $page_total = 0) {
        $review_model = M('reviews');
        $lang_site = $site_val['listing_site_name']; //站点
        $site_url = $site_val['listing_site_url']; //站点URL
        $asin_code = $listings_val['asin'];
        $url = $site_url . '/product-reviews/' . $asin_code . '/ref=cm_cr_pr_show_all?ie=UTF8&showViewpoints=1&sortBy=recent&pageNumber=' . $page_number;
        $cookie = '_mkto_trk=id:810-GRW-452&token:_mch-amazon.com-1447228094903-26910';
        $response_temp = $this->curl_http($url, $cookie);
        if (empty($response_temp)) {
            echo "Asin:" . $asin_code . "---Page:" . $page_number . "---Curl Error\n";
        } else {
            $html_content = $this->clearAllForHtml($response_temp);
            //如果是第一页就先,获取评价总数
            if ($page_number == 1) {
                $review_total_html = $this->getHtmlTag('<span class="a-size-medium a-text-beside-button totalReviewCount">', $html_content);
                $review_total_array = array();
                preg_match_all('/<span class=".*">(.*)</isU', $review_total_html, $review_total_array);
                $review_total = $review_total_array[1][0];
                if (empty($review_total)) {
                    $review_total = 0;
                }
                //每页10条数据,获取总页数
                $page_total = ceil($review_total / 10);
            }
            if ($page_total == 0) {
                echo "Asin:" . $asin_code . "---Review Total:" . $review_total . "\n";
            } else {
                $review_list_html = $this->getHtmlTag('<div id="cm_cr-review_list" class="a-section a-spacing-none reviews celwidget">', $html_content);
                if (empty($review_list_html)) {
                    echo "Asin:" . $asin_code . "---Review List:Empty---Page Number:" . $page_number . "/" . $page_total . "\n";
                } else {
                    //review_id
                    preg_match_all('/<div id="(.*)" class="a-section review">/', $review_list_html, $review_id_array);
                    $review_id_ar = $review_id_array[1];
                    $review_list_html = str_replace("\n", '', $review_list_html);
                    //star
                    $reg_star = '/<i class="a-icon a-icon-star a-star-(\d) review-rating">/';
                    preg_match_all($reg_star, $review_list_html, $star_matches);
                    $star_ar = $star_matches[1];
                    //by who
                    $reg_by = '/<a class=\"a-size-base a-link-normal author\"[^<>]*\">([^<]*)<\/a><\/span><span class=\"a-declarative\"/';
                    preg_match_all($reg_by, $review_list_html, $by_matchs);
                    $by_ar = $by_matchs[1];
                    //title
                    $reg_title = '/<a class=\"a-size-base a-link-normal review-title a-color-base a-text-bold\"[^<>]*\">([^<]*)<\/a><\/div><div class=\"a-row\">/';
                    preg_match_all($reg_title, $review_list_html, $title_matchs);
                    $title_ar = $title_matchs[1];
                    //content
                    $reg_content = '/<span class=\"a-size-base review-text\">([^<]*)<\/span><\/div><div class=\"a-row/';
                    preg_match_all($reg_content, $review_list_html, $content_matchs);
                    $content_ar = $content_matchs[1];
                    //time
                    preg_match_all('/<span class="a-size-base a-color-secondary review-date">(.*)<\/span>/isU', $review_list_html, $create_matchs);
                    $create_time_array = $create_matchs[1];
                    $review_data = array();
                    $k = 0;
                    foreach ($star_ar as $key => $star_val) {
                        $amz_review_id = md5($review_id_ar[$key] . $asin_code);
                        if (in_array($amz_review_id, $amz_reviewid_array)) {
                            $result_str = 'Skip';
                        } else {
                            $review_data[$k]['type'] = 2;
                            $review_data[$k]['amz_review_id'] = $amz_review_id;
                            $review_data[$k]['review_title'] = $title_ar[$key];
                            $review_data[$k]['review_content'] = $content_ar[$key];
                            $review_data[$k]['review_item_id'] = $listings_val['item_id'];
                            $review_data[$k]['review_asin'] = $asin_code;
                            $review_data[$k]['review_site'] = $site_val['listing_site_id'];
                            //$review_data[$k]['review_create_time'] = $this->get_time($create_time_array[$key], $lang_site);
                            $review_data[$k]['review_create_time'] = date('Y-m-d H:i:s');
                            $review_data[$k]['review_create_username'] = $by_ar[$key];
                            $review_data[$k]['review_language'] = $site_val['listing_site_language_code'];
                            $review_data[$k]['review_rate'] = intval($star_val);
                            $k++;
                            $result_str = 'New';
                        }
                        echo $result_str . "---Asin:" . $asin_code . "---Review Id:" . $review_id_ar[$key] . "---Page Number:" . $page_number . "/" . $page_total . "\n";
                    }
                    if (!empty($review_data)) {
                        $review_model->addAll($review_data);
                    }
                    //循环获取评论
                    if ($page_number < $page_total) {
                        $page_number++;
                        $this->getReviewDataByUs($listings_val, $amz_reviewid_array, $site_val, $page_number, $page_total);
                    }
                }
            }
        }
    }

    /**
     * 发送请求
     * @param string $asin_code
     * @param int $page_number 页码
     * @return string
     */
    public function curl_http($url, $cookie) {
        $user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie');
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    /*
     * 解析时间
     * 不同站点时间格式可能不一样
     */

    public function get_time($time, $lang_site) {
        if (in_array($lang_site, array('US', 'GB'))) {
            $time = str_replace('on', '', $time);
            $time = trim($time);
            return date('Y-m-d', strtotime($time));
        }
        if (in_array($lang_site, array('DE'))) {
            $time = str_replace('am', '', $time);
            $time = str_replace('pm', '', $time);
            $time = trim($time);
            echo $time;
            die();
            return date('Y-m-d', strtotime($time));
        }
    }

    /*     * ********************************************************************************************************* */

    public function clearAllForHtml($html_content) {
        $html_content = $this->clearHtmlComment($html_content);
        $html_content = $this->clearHtmlJavascript($html_content);
        $html_content = $this->clearHtmlStyleCss($html_content);
        $html_content = $this->clearMultiBlank($html_content);
        $html_content = $this->clearOneBlankline($html_content);
        $html_content = $this->splitTwoTag($html_content);
        $html_content = $this->clearMultiNewline($html_content);
        return $html_content;
    }

    public function clearHtmlComment($html) {
        $html_comment = "/<!--(.*)-->/Uis";
        $html = preg_replace($html_comment, '', $html);
        return $html;
    }

    public function clearHtmlJavascript($html) {
        $pattern_js = "'<script[^>]*?>.*?</script>'si";
        $html = preg_replace($pattern_js, '', $html);
        return $html;
    }

    public function clearHtmlStyleCss($html) {
        $pattern_js = "'<style[^>]*?>.*?</style>'si";
        $html = preg_replace($pattern_js, '', $html);
        return $html;
    }

    public function clearMultiBlank($html) {
        $html = preg_replace("/(\t)+/", ' ', $html);
        $html = preg_replace("/(\040)+/", ' ', $html);
        return $html;
    }

    public function clearOneBlankline($html) {
        $html = preg_replace("/(\r\n)(\040)+/", "\n", $html);
        $html = preg_replace("/(\n)(\040)+/", "\n", $html);
        return $html;
    }

    public function splitTwoTag($html) {
        $html = preg_replace("/></", ">\n<", $html);
        return $html;
    }

    public function clearMultiNewline($html) {
        $html = preg_replace("/(\r\n)+/", "\n", $html);
        $html = preg_replace("/(\n)+/", "\n", $html);
        return $html;
    }

    /** 读取Html内一个标签 */
    public function getHtmlTag($tag_name, &$str, $offset = 0, $nums = 0) {
        $tag_stack_arr = array();
        // 开始扫描的位置
        if ($offset != 0) {
            $key_start_index = $offset;
        } else {
            $key_start_index = strpos($str, $tag_name);
            if ($key_start_index === false) {
                return false;
            }
        }
        // 查找标签结束符
        if (false == preg_match("/\s/", $tag_name)) {
            $key_end_tag = str_replace('<', '</', $tag_name);
            $key_end_length = strlen($key_end_tag);
            $key_start_tag = $tag_name;
            $key_start_length = strlen($key_start_tag);
        } else {
            $key_end_arr = explode(' ', $tag_name);
            $key_end_tag = $key_end_arr[0] . '>';
            $key_end_tag = str_replace('<', '</', $key_end_tag);
            $key_end_length = strlen($key_end_tag);
            $key_start_tag = $key_end_arr[0] . ' ';
            $key_start_length = strlen($key_start_tag);
        }

        // 针对图片标签等标签重新设置结束符
        $single_tag_arr = array('<img ');
        if (in_array($key_start_tag, $single_tag_arr)) {
            $key_end_tag = '>';
            $key_end_length = 1;
        }

        // 加入多个开始标签，修正html不配对问题
        if ($nums > 0) {
            $tag_stack_arr = array_fill(0, $nums, $key_start_tag);
        }

        $total_content_length = strlen($str);
        $tag_content = $this->readLineData($key_start_index, $str);
        $line_content = $tag_content;
        $scan_index = 0;
        $is_end_tag = false;
        $row_count = 1;
        $offset_scan_index = 0;

        while (true) {
            // 扫描内容，查询结束符
            $content_length = strlen($tag_content);
            for ($i = $scan_index; $i < $content_length; $i++) {
                $scan_char = $tag_content[$i];
                // 扫描结束符
                for ($j = 0; $j < $key_end_length; $j++) {
                    $end_tag_char = $key_end_tag[$j];
                    if ($scan_char == $end_tag_char) {
                        // echo $scan_char;
                        // 扫描时，考虑跳过空格
                        if ($j == ($key_end_length - 1)) {
                            // 已经扫描到 结束符的最后最后一个字符了
                            // 则说明已经找到了标签结束符，返回标签内容
                            // 去除最后一行，结束标签后面的内容
                            // $this->outTextStr($tag_content,"border:solid 1px #ff0000; width:60%;");
                            array_pop($tag_stack_arr);
                            if (count($tag_stack_arr) == 0) {
                                return substr($tag_content, 0, ($i + $j + 1));
                            }
                        }
                        $scan_char = $tag_content[$i + $j + 1];
                        $offset_scan_index++;
                        // 设置扫描偏移量
                        continue;
                    }
                    // 设置扫描偏移量
                    break;
                }

                $scan_char = $tag_content[$i];
                // 扫描相同标签,压入数组,用于计算正确的结束标签
                for ($j = 0; $j < $key_start_length; $j++) {
                    $start_tag_char = $key_start_tag[$j];
                    if ($scan_char == $start_tag_char) {
                        // 扫描时，考虑跳过空格
                        if ($j == ($key_start_length - 1)) {
                            // 扫描到新的开始标签时，压入堆栈
                            // $this->outTextStr($tag_content,"border:solid 1px #0000ff;width:60%;");
                            array_push($tag_stack_arr, $key_start_tag);
                        }
                        $scan_char = $tag_content[$i + $j + 1];
                        continue;
                    }
                    break;
                }
                // 偏移量加到 $i 上面
                $i = $i + $offset_scan_index;
                $offset_scan_index = 0;
                // 设置扫描偏移量
                $scan_index = $i;
            }
            // 再读取下一行
            $line_content = $this->readLineData($key_start_index, $str);
            $tag_content = $tag_content . $line_content;
            if ($line_content == '') {
                break;
            }
            // 计数器器加一
            $row_count++;
        }
    }

    public function readLineData(&$index, &$str) {
        $line_string = '';
        while (true) {
            $letter = $str[$index];
            // echo $index.':'.$letter.'<br/>';
            if ($letter == '') {
                // 文档结束
                break;
            }
            if ($letter == "\n") {
                // unix 换行符
                $line_string.=$letter;
                $index++;
                break;
            }
            if ($letter == "\r" && $str[($index + 1)] == "\n") {
                // windows 换行符
                $line_string.=$letter . "\n";
                $index = $index + 2;
                break;
            }
            $line_string.=$letter;
            $index++;
        }
        return $line_string;
    }

    /*     * ********************************************************************************************************* */

    /**
     * 获取评论数据
     * @param string $asin_code
     * @param int $page_number 页码
     * @return array
     */
    public function getReviewData($asin_code, $page_number) {
        $review_data = array();
        $response = $this->http($asin_code, $page_number);
        $response = str_replace("\n", '', $response);
        $reg = '/<div id="cm_cr-review_list" class="a-section a-spacing-none reviews celwidget\">(.*)<\/div><div class=\"a-spinner-wrapper reviews-load-progess aok-hidden a-spacing-top-large\">/';
        preg_match($reg, $response, $matchs);
        $review_box = $matchs[1];
        unset($matchs, $response);
        if (!$review_box) {
            return $review_data;
        }

        // star
        $reg_star = '/<i class="a-icon a-icon-star a-star-(\d) review-rating">/';
        preg_match_all($reg_star, $review_box, $star_matches);
        $star_ar = $star_matches[1];
        unset($star_matches);
        if (!$star_ar) {
            return $review_data;
        }

        // by who
        $reg_by = '/<a class=\"a-size-base a-link-normal author\"[^<>]*\">([^<]*)<\/a><\/span><span class=\"a-declarative\"/';
        preg_match_all($reg_by, $review_box, $by_matchs);
        $by_ar = $by_matchs[1];
        unset($by_matchs);

        // title
        $reg_title = '/<a class=\"a-size-base a-link-normal review-title a-color-base a-text-bold\"[^<>]*\">([^<]*)<\/a><\/div><div class=\"a-row\">/';
        preg_match_all($reg_title, $review_box, $title_matchs);
        $title_ar = $title_matchs[1];
        unset($title_matchs);

        // content
        $reg_content = '/<span class=\"a-size-base review-text\">([^<]*)<\/span><\/div><div class=\"a-row/';
        preg_match_all($reg_content, $review_box, $content_matchs);
        $content_ar = $content_matchs[1];
        unset($content_matchs, $review_box);

        if ($star_ar) {
            foreach ($star_ar as $key => $star_val) {
                $review_data[$key]['star'] = intval($star_val);
                $review_data[$key]['title'] = $title_ar[$key];
                $review_data[$key]['by'] = $by_ar[$key];
                $review_data[$key]['content'] = $content_ar[$key];
            }
        }

        return $review_data;
    }

    /**
     * 发送请求
     * @param string $asin_code
     * @param int $page_number 页码
     * @return string
     */
    public function http($asin_code = '', $page_number = 1) {
        $url = 'http://www.amazon.com/product-reviews/' . $asin_code . '/ref=cm_cr_pr_show_all?ie=UTF8&showViewpoints=1&sortBy=recent&pageNumber=' . $page_number;
        $cookie = '_mkto_trk=id:810-GRW-452&token:_mch-amazon.com-1447228094903-26910';
        $user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie');
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}

?>