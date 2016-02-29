<?php

namespace Home\Action;

use Think\Action;

class BaseAction extends Action {

    protected $lang = '';
    protected $country_code = '';

    public function __construct() {
        parent::__construct();
        //站点数据
        $site_data = $this->getSiteData();
        //根据IP获取国家
        $this->getCountryCode($site_data);
        $this->country_code = $_COOKIE['Country_Code'];
        //语言
        $lang_data = $site_data[$this->country_code];
        $_COOKIE['think_language'] = $lang_data['listing_site_language'];
        $this->lang = $lang_data['listing_site_language_code'];
        //分类数据
        $this->getCategoryData();
        $category_data = $this->categoryMenu();
        $foot_bestseller = $this->hotOrLikeProductData('hot', 5);

        $this->assign('username', session('username'));
        $this->assign('site_datas', $site_data);
        $this->assign('lang_data', $lang_data);
        $this->assign('foot_bestseller', $foot_bestseller);
        $this->assign('country_code', $this->country_code);
        $this->assign('category_menu', $category_data[0]['child_category']);
    }

    /*
     * 顶部分类导航
     */

    private function categoryMenu() {
        $category_data = $this->sortOut($_SESSION['Category_Data']);
        $category = array();
        foreach ($category_data as $category_value) {
            if ($category_value['level'] == 1) {
                $category[] = $category_value;
            }
        }
        $categorydata = $this->childMenu($category_data, $category);
        return $categorydata;
    }

    private function sortOut($cate, $pid = 0, $level = 0) {
        $tree = array();
        foreach ($cate as $v) {
            if ($v['parent_id'] == $pid) {
                $v['level'] = $level + 1;
                $tree[] = $v;
                if (empty($v['category_id'])) {
                    break;
                }
                $tree = array_merge($tree, $this->sortOut($cate, $v['category_id'], $level + 1));
            }
        }
        return $tree;
    }

    private function childMenu($category_data, $category) {
        foreach ($category as $value) {
            $child_category = array();
            foreach ($category_data as $category_val) {
                if ($category_val['parent_id'] == $value['category_id'] && $category_val['level'] == $value['level'] + 1) {
                    $child_category[] = $category_val;
                }
            }
            if (count($child_category) > 0) {
                $value['child_category'] = $this->childMenu($category_data, $child_category);
            } else {
                $value['child_category'] = "";
            }
            $categorydata[] = $value;
        }
        return $categorydata;
    }

    /*
     * 传入产品分类ID
     * 返回产品所有上级分类信息
     */

    public function getProductCategory($category_id) {
        $category_data = $_SESSION['Category_Data'];
        $tree = array();
        while ($category_id != 0) {
            $flag = 0;
            foreach ($category_data as $item) {
                if ($item['category_id'] == $category_id) {
                    $tree[] = $item;
                    $category_id = $item['parent_id'];
                    $flag = 1;
                    break;
                }
            }
            if ($flag == 0) {
                $category_id = 0;
            }
        }
        $tree_tmep = array_reverse($tree);
        return $tree_tmep;
    }

    /*
     * 传入分类ID
     * 返回该分类的所有下级分类ID
     */

    public function getChildCategoryID($category_id, $all_category = '') {
        if (empty($all_category)) {
            $all_category = $this->categoryMenu();
        }
        $temp_category = '';
        foreach ($all_category as $all_val) {
            if ($all_val['category_id'] == $category_id) {
                $temp_category = $all_val;
                break;
            } else {
                if (!empty($all_val['child_category'])) {
                    $temp_category = $this->getChildCategoryID($category_id, $all_val['child_category']);
                }
            }
        }
        $cate_id_array = $this->getChildCateID($temp_category);
        $cate_id_array_temp = array_unique($cate_id_array);
        return array_filter($cate_id_array_temp);
    }

    private function getChildCateID($temp_category) {
        global $cate_id;
        $cate_id[] = $temp_category['category_id'];
        if (!empty($temp_category['child_category'])) {
            foreach ($temp_category['child_category'] as $temp_cate) {
                $cate_id[] = $temp_cate['category_id'];
                if (!empty($temp_cate['child_category'])) {
                    $this->getChildCateID($temp_cate);
                }
            }
        }
        return $cate_id;
    }

    /*
     * 热销产品和喜欢产品
     */

    public function hotOrLikeProductData($type, $limit_nums, $data = '') {
        $list_model = M('listings');
        $list_base_model = M('listings_baseinfo');
        $where = "item_status = 1";
        if ($type == 'like') {
            $where.="  and item_id != " . $data['product_id'];
            if (!empty($data['cate_id_array'])) {
                $where.=" and category_id in (" . implode(',', $data['cate_id_array']) . ")";
            }
        }
        $list_data = $list_model->field('item_id,sku_common_images,item_code')->where($where)->order('sell_num desc')->limit($limit_nums)->select();
        if (!empty($list_data)) {
            $list_data_temp = array();
            $list_item_id = $list_item_code = array();
            foreach ($list_data as $list_val) {
                $list_item_id[] = $list_val['item_id'];
                $list_item_code[$list_val['item_id']] = $list_val['item_code'];
                $list_data_temp[$list_val['item_id']] = $list_val['sku_common_images'];
            }
            unset($list_data);
            $list_base = $list_base_model->where("item_id in (" . implode(',', $list_item_id) . ") and item_language = '$this->lang'")->select();
            foreach ($list_base as $key => $list_base_val) {
                $image_url = unserialize($list_data_temp[$list_base_val['item_id']]);
                $image_temp_array = pathinfo($image_url[0]);
                $list_base_val['image_url'] = $image_url[0];
                $list_base_val['image_sku'] = $image_temp_array['filename'];
                $list_base_val['item_code'] = $list_item_code[$list_base_val['item_id']];
                $list_base[$key] = $list_base_val;
            }
        }
        return $list_base;
    }

    /*
     * 获取所有分类数据
     * 保存到session['Category_Data']
     */

    private function getCategoryData() {
        //if (empty($_SESSION['Category_Data'])) {
        $category_model = M('category');
        $category_data = $category_model
                ->join("womdee_category_details as de on de.category_id = womdee_category.category_id")
                ->where("de.category_language = '$this->lang' and womdee_category.category_status = 1")->order("womdee_category.category_sort asc")
                ->getField('womdee_category.category_id,womdee_category.parent_id,de.category_id,de.category_title');
        foreach ($category_data as $k => $value) {
            //$title1 = strtolower($value['category_title']);
            //$title2 = str_replace(' ', '-', $title1);
            //$title3 = str_replace("&#039;", '', $title2);
            $value['url'] = '/Product/productList/cateid/' . $value['category_id'];
            $category_data[$k] = $value;
        }
        $_SESSION['Category_Data'] = $category_data;
        //}
    }

    /*
     * 解析URL返回分类和属性值
     */

    public function getUrlData($url) {
        $url_row = array_filter(explode('/', $url)); //去空
        $data = array();
        foreach ($url_row as $val) {
            //分类
            if (preg_match_all("/^([a-z0-9\-]+)-c(\d+)/i", $val, $category_val)) {
                $category_id = $category_val[2][0];
                $data['category_id'] = $category_id;
            }
            if (preg_match_all("/(\d+)\.html$/i", $val, $page_val)) {
                $page_array = explode(".", $val);
                if (preg_match("/^[0-9]*$/", $page_array[0])) {
                    $data['page'] = $page_val[1][0];
                }
            }
        }
        if ($data['page'] != '') {
            $page_url = '/' . $data['page'] . '.html';
        }
        //正确的url
        if (!empty($data['category'])) {
            $data['real_request_uri'] = $data['category']['url'] . $page_url;
        }
        //产品地址
        if (preg_match_all("/([a-z0-9\-]+)\-p(\d+)\.html/", $url_row[1], $product_data)) {
            $data['product_url'] = '/' . $product_data[0][0];
            $data['product_id'] = $product_data[2][0];
        }
        //reviews
        if (preg_match_all("/^\/product-review\/user-([a-z0-9\-]+)-(\d+)/i", $url, $user_review_data)) {
            $data['username'] = trim($user_review_data[1][0]);
            $data['userid'] = trim($user_review_data[2][0]);
        }
        if (preg_match_all("/^\/product-review\/([a-z0-9\-]+)-p(\d+)/i", $url, $product_review_data)) {
            $data['product_review_id'] = $product_review_data[2][0];
        }
        return $data;
    }

    /**
     * 获取国家列表
     * @param mixed $where
     * @return mixed
     */
    public function getCountryList($where = '') {
        $model_country = M('country');
        return $model_country->where($where)->getField('country_id,country_' . $this->lang);
    }

    /*
     * 站点
     */

    private function getSiteData() {
        //if (empty($_SESSION['Site_Data'])) {
        $sites_list_model = M('sites_list');
        $site_data = $sites_list_model->where("listing_show = 1")->order('listing_site_sort asc')->select();
        $site_data_temp = array();
        foreach ($site_data as $site_val) {
            $site_data_temp[$site_val['listing_site_name']] = $site_val;
        }
        $_SESSION['Site_Data'] = $site_data_temp;
        //}
        return $_SESSION['Site_Data'];
    }

    /*
     * 获取国家数据
     */

    private function getCountryCode($site_data) {
        if (empty($_COOKIE['Country_Code'])) {
            //$url = "http://ip-api.com/json";
            $ip = getIPaddress();
            $url = "http://ipinfo.io/" . $ip;
            $result = readHtmlWithCurl($url);
            if (empty($result)) {
                $_COOKIE['Country_Code'] = 'US';
            } else {
                $result_temp = json_decode($result, TRUE);
                //中国默认都转美国
                if ($result_temp['country'] == 'CN') {
                    $result_temp['country'] = 'US';
                }
                $_COOKIE['Country_Code'] = $result_temp['country'];
            }
        }
        $site_result = $site_data[$_COOKIE['Country_Code']];
        if (empty($site_result)) {
            $_COOKIE['Country_Code'] = 'US';
        }
    }

}

?>