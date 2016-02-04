<?php

namespace Home\Action;

class ProductAction extends BaseAction {

    //产品列表
    public function productList() {
        $category_id = $_REQUEST['cateid'];
        //分类目录
        $category_array = $this->getProductCategory($category_id);
        //所有子分类
        $category_id_array = $this->getChildCategoryID($category_id);
        $device_type = checkDeviceType();
        //产品列表
        $item_data = $this->getItemData($category_id_array);
        //热销产品
        $hot_data = $this->hotOrLikeProductData('hot', 8);

        $this->assign('category_array', $category_array);
        $this->assign('device', $device_type);
        $this->assign('product', $item_data['item_list']);
        $this->assign('product_detail', $item_data['list_detail']);
        $this->assign('page_show', $item_data['page']);
        $this->assign('hot_product', $hot_data);
        $this->display('product_list');
    }

    private function getItemData($category_id_array) {
        $list_model = M('listings');
        $list_detail_model = M('listings_baseinfo');
        $where = "item_status = 1 and category_id in (" . implode(',', $category_id_array) . ")";
        $count = $list_model->where($where)->count();
        $page = new \Think\Page($count, 3);
        $list = $list_model->where($where)->order('sell_num desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $show_page = $page->pageShow();

        if (!empty($list)) {
            $list_id = array();
            foreach ($list as $key => $list_val) {
                $list_id[] = $list_val['item_id'];
                $sku_common_images = unserialize($list_val['sku_common_images']);
                $img_array = pathinfo($sku_common_images[0]);
                $list_val['image_sku'] = $img_array['filename'];
                $list[$key] = $list_val;
            }
            $list_detail = $list_detail_model->where("item_id in (" . implode(',', $list_id) . ") and item_language = '$this->lang'")
                    ->getField("item_id,item_title");
        }
        $result = array('item_list' => $list, 'page' => $show_page, 'list_detail' => $list_detail);
        return $result;
    }

    //产品详情
    public function productDetail() {
        $request_uri = $_SERVER['REQUEST_URI'];
        $request_url_data = $this->getUrlData($request_uri);
        $product_id = $request_url_data['product_id'];
        //设备类型
        $device_type = checkDeviceType();
        //获取产品详情信息
        $data = $this->getProductDetailById($product_id);
        $product_list = $data['listing'];
        $product_baseinfo = $data['base_info']; //产品标题描述
        //$list_detail = $data['list_detail']; //产品属性图片
        $product_attr = $data['attr_detail'];
        $product_img = $data['image_array'];
        //分类目录导航
        $category_id = $product_list['category_id'];
        $category_array = $this->getProductCategory($category_id);
        //评论内容
        $reviews = $this->getProductReview($product_id);
        //FAQ数据
        $faq_data = $this->getFaqData();
        //like产品
        $category_id_array = $this->getChildCategoryID($category_id);
        $like_product = $this->hotOrLikeProductData('like', 4, array('cate_id_array' => $category_id_array, 'product_id' => $product_id));
        //产品对应AMZ站点
        $site_data = $this->getAmzSiteList($product_list['item_sites']);

        $this->assign('userid', session('userid'));
        $this->assign('username', session('username'));
        $this->assign('category_array', $category_array);
        $this->assign('product_list', $product_list);
        $this->assign('product_baseinfo', $product_baseinfo);
        $this->assign('site_data', $site_data);
        $this->assign('product_attr', $product_attr);
        $this->assign('product_img', $product_img);
        $this->assign('device', $device_type);
        $this->assign('reviews', $reviews['data']);
        $this->assign('review_sum_pages', $reviews['review_sum_pages']);
        $this->assign('faq_data', $faq_data);
        $this->assign('like_product', $like_product);
        $this->assign('item_id', $product_id);
        $this->display('product_detail');
    }

    public function productSearch() {
        $model_listing = M('listings');
        $model_listbase = M('listings_baseinfo');
        $params = I('get.');
        $key = $params['search_key'];

        // item_title
        $where = 'item_title like "%' . $key . '%" and item_language = "' . $this->lang . '"';
        $temp = $model_listbase->where($where)->field('item_id,item_title')->select();
        $item_ids = $detail = $data = array();
        foreach ($temp as $rs) {
            $item_ids[] = $rs['item_id'];
            $detail[$rs['item_id']] = $rs['item_title'];
        }


        $item_ids = array_unique(array_filter($item_ids));
        if ($item_ids) {
            $img_data = $model_listing
                    ->where('item_id in (' . implode(',', $item_ids) . ')')
                    ->getField('item_id,sku_common_images');
            foreach ($temp as $key => $rs) {
                $sku_common_images = unserialize($img_data[$rs['item_id']]);
                $img_array = pathinfo($sku_common_images[0]);
                //$temp[$key]['sku_common_images'] = $img_data[$rs['item_id']];
                $temp[$key]['image_sku'] = $img_array['filename'];
            }
        }

        // item_code
        $code_data = $model_listing->where('item_code like "%' . $key . '%"')
                ->getField('item_id,sku_common_images');

        $item_ids_ar1 = array_keys($code_data);
        if ($item_ids_ar1) {
            $title_data = $model_listbase->where('item_id in (' . implode(',', $item_ids_ar1) . ') and item_language = "' . $this->lang . '"')
                    ->getField('item_id, item_title');
            foreach ($code_data as $item_id => $img) {
                $sku_common_images = unserialize($img);
                $img_array = pathinfo($sku_common_images[0]);
                $temp[] = array(
                    'item_id' => $item_id,
                    'image_sku' => $img_array['filename']
                );
                $detail[$item_id] = $title_data[$item_id];
            }
        }
        $device_type = checkDeviceType();
        $this->assign('device', $device_type);
        if (!$temp) {
            $this->assign('no_search_product', true);
        } else {
            $this->assign('product', $temp);
            $this->assign('product_detail', $detail);
        }


        $hot_data = $this->hotOrLikeProductData('hot', 8);
        $this->assign('hot_product', $hot_data);
        $this->display('product_list');
    }

    private function getProductDetailById($product_id) {
        $listing_model = M('listings');
        $listing_base_model = M('listings_baseinfo');
        $listing_detail_model = M('listings_detail');

        $list_data = $listing_model->where("item_id = $product_id")->find();
        $base_info = $listing_base_model->where("item_id = $product_id and item_language = '$this->lang'")->field('item_id,item_title,item_description')->find();
        $list_detail = $listing_detail_model->where('item_id = ' . $product_id)->field('item_id,sku,sku_attribute_arrays,sku_images')->select();

        $color_list = get_lang_color();
        $color_val_array = array();
        $product_attr_detail = $product_img_detail = array();
        foreach ($list_detail as $rs) {
            $attr_ar = unserialize($rs['sku_attribute_arrays']);
            $attr_ar_temp = $attr_ar[$this->lang];
            $sku_images_array = '';
            foreach ($attr_ar_temp as $attr_key => $attr_val) {
                if (in_array($attr_key, $color_list) && !in_array($attr_val, $color_val_array)) {
                    $color_val_array[] = $attr_val;
                    $sku_images_array = unserialize($rs['sku_images']);
                }
                if (!in_array($attr_val, $product_attr_detail[$attr_key])) {
                    $product_attr_detail[$attr_key][] = $attr_val;
                }
            }
            if (!empty($sku_images_array)) {
                foreach ($sku_images_array as $sku_images_row) {
                    $temp_array = pathinfo($sku_images_row);
                    $sku_name = $temp_array['filename'];
                    $product_img_detail[] = $sku_name;
                }
            }
        }
        //附加尺码图
        $list_img = unserialize($list_data['sku_common_images']);
        foreach ($list_img as $list_img_val) {
            $img_array = pathinfo($list_img_val);
            $product_img_detail[] = $img_array['filename'];
        }
        $product_img_detail = array_unique($product_img_detail);
        return array('listing' => $list_data, 'base_info' => $base_info, 'list_detail' => $list_detail, 'attr_detail' => $product_attr_detail, 'image_array' => $product_img_detail);
    }

    /*
     * FAQ 内容
     */

    private function getFaqData() {
        $faq_model = M('faq');
        $faq_data = $faq_model->where("is_show = 1 and lang = '$this->lang'")->order('sort asc')->select();
        $i = 1;
        foreach ($faq_data as $k => $faq_row) {
            $faq_row['kk'] = $i++;
            $faq_data[$k] = $faq_row;
        }
        return $faq_data;
    }

    public function getAttr($where) {
        $model_attr = M('attributes');
        $data = $model_attr->where($where)->getField('attribute_id,attribute_title_' . $this->lang);
        return $data;
    }

    public function getAttrVal($where) {
        $model_attr = M('attributes_values');
        $data = $model_attr->where($where)->getField('attribute_value_id,attribute_value_' . $this->lang);
        return $data;
    }

    /**
     * 获取产品的评论
     */
    private function getProductReview($item_id) {
        $model_review = M('reviews');
        $where = "review_show = 1 and review_item_id = $item_id and review_language = '$this->lang'";
        $count = $model_review->where($where)->count();
        $page_size = C('PAGE_SIZE');
        $page_size = $page_size ? $page_size : 2;
        $Page = new \Think\Page($count, $page_size);
        $page_size = C('PAGE_SIZE');
        if (!$page_size) {
            $page_size = 2;
        }
        $review_sum_pages = ceil($count / $page_size); // 总页数

        $data = $model_review->where($where)->order('review_create_time desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $show_page = $Page->pageShow();

        return array('data' => $data, 'page' => $show_page, 'review_sum_pages' => $review_sum_pages);
    }

    /*
     * 产品对应AMZ站点
     */

    private function getAmzSiteList($site_ids) {
        if (empty($site_ids)) {
            return false;
        }
        $sites_list_model = M('sites_list');
        $site_data = $sites_list_model->where("listing_site_id in ($site_ids) and listing_site_name = '$this->country_code'")->order('listing_site_sort asc')->find();
        return $site_data;
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

    private function getItemDataByWhere($where = '', $order = '', $limit_from = 0, $limit_num = 0) {
        $model_list = M('listings');
        $model_list_base = M('listings_baseinfo');
        if ($limit_num) {
            $limit = $limit_from . ',' . $limit_num;
        } else {
            if ($limit_from) {
                $limit = $limit_from;
            } else {
                $limit = C('PAGE_SIZE');
            }
        }


        $item_temp = $model_list
                        ->where($where)
                        ->order($order)
                        ->limit($limit)->getField('item_id,sku_common_images');
        $item_ids = array_keys($item_temp);
        $item_ids = array_unique(array_filter($item_ids));

        if ($item_ids) {
            $where_baseinfo = 'item_id in (' . implode(',', $item_ids) . ') and item_language = "' . $this->lang . '"';
            $item_data = $model_list_base
                    ->where($where_baseinfo)
                    ->field('item_id,item_title')
                    ->select();
            foreach ($item_data as $key => $rs) {
                //$item_data[$key]['image'] = $item_temp[$rs['item_id']];

                $sku_common_images = unserialize($item_temp[$rs['item_id']]);
                $img_array = pathinfo($sku_common_images[0]);
                $item_data[$key]['image_sku'] = $img_array['filename'];
            }
        } else {
            $item_data = array();
        }

        return $item_data;
    }

    /**
     * 产品分页
     */
    public function gotoPage() {
        $params = I('get.');
        $page = $params['page'];
        $current_page = $params['current_page'];
        $cateid = $params['cate_id'];

        // 每页数目
        $page_size = C('PAGE_SIZE');
        // 总页数
        $count = M('listings')->where(array('item_status' => 1))->count();
        $page_num = ceil($count / $page_size);
        if ($page > $page_num) {
            return $this->ajaxReturn(
                            array(
                                'status' => false,
                                'data' => L('NO_MORE_PRODUCT')
                    ));
        }
        switch ($page) {
            case 'next':
                $page = $current_page + 1;
                if ($page >= 2) {
                    if ($page_num == $page) {
                        $page_3 = $page;
                        $page_2 = $page - 1;
                        $page_1 = $page - 2;
                    } else {
                        $page_3 = $page + 1;
                        $page_2 = $page;
                        $page_1 = $page - 1;
                    }
                } else {
                    $page_3 = 3;
                    $page_2 = 2;
                    $page_1 = 1;
                }
                break;
            case 'prev':
                if ($current_page == 1) {
                    return;
                }
                $page = $current_page - 1;
                if ($page >= 2) {
                    $page_3 = $page + 1;
                    $page_2 = $page;
                    $page_1 = $page - 1;
                } else {
                    $page_3 = 3;
                    $page_2 = 2;
                    $page_1 = 1;
                }
                break;
            case 'first':
                $page = 1;
                $page_3 = 3;
                $page_2 = 2;
                $page_1 = 1;
                break;
            case 'last':
                $page = $page_num;
                if ($page >= 3) {
                    $page_3 = $page;
                    $page_2 = $page - 1;
                    $page_1 = $page - 2;
                } else {
                    $page_3 = 3;
                    $page_2 = 2;
                    $page_1 = 1;
                }
                break;
            default:
                $current_page = $page;
                break;
        }
        //所有子分类
        $category_id_array = $this->getChildCategoryID($cateid);

        $where = 'item_status = 1 and category_id in (' . implode(',', $category_id_array) . ')';
        $data = $this->getItemDataByWhere($where, '', ($page - 1) * $page_size, $page_size);
        if (!$data) {
            return $this->ajaxReturn(
                            array(
                                'status' => false,
                                'data' => L('NO_MORE_PRODUCT')
                    ));
        }
        $this->assign('product', $data);
        $html = $this->fetch('product_list_item');
        return $this->ajaxReturn(
                        array(
                            'status' => true,
                            'data' => array(
                                'current_page' => $page,
                                'page_3' => $page_3,
                                'page_2' => $page_2,
                                'page_1' => $page_1,
                                'html' => $html
                            )
                        )
        );
    }

    /**
     * 评论
     */
    public function actionReview() {
        $params = I('post.');
        $userid = intval(session('userid'));
        if (!$userid) {
            return $this->ajaxReturn(array(
                        'status' => false,
                        'data' => array(
                            'info' => L('NO_LOGIN')
                        )
                    ));
        }

        $verify = new \Think\Verify();
        $status = $verify->check($params['captcha-code']);
        if (!$status) {
            /*
              return $this->ajaxReturn(array(
              'status' => false,
              'data' => array(
              'info' => L('ERROR_CAPTCHA')
              )
              ));
             */
        }

        $data = array(
            'review_content' => addslashes($params['content']),
            'review_title' => addslashes($params['comment_title']),
            'review_item_id' => intval($params['item_id']),
            'review_create_time' => date('Y-m-d H:i:s'),
            'review_create_userid' => $userid,
            'review_rate' => intval($params['review_rate']),
            'review_language' => $this->lang
        );

        $user_fields = 'user_id,user_email';
        $where = array('user_id' => $userid);
        $user_data = \Home\Action\UserAction::getUserData($user_fields, $where);
        $this->assign('user_data', $user_data);
        $this->assign('reviews', array($data));
        $html = $this->fetch('product_review_item');

        if (M('reviews')->add($data)) {
            $ret = array(
                'status' => true,
                'data' => array(
                    'info' => L('COMMENT_SUCCESS'),
                    'html' => $html
                )
            );
        } else {
            $ret = array(
                'status' => false,
                'data' => array(
                    'info' => L('COMMENT_FAILED')
                )
            );
        }
        return $this->ajaxReturn($ret);
    }

    /**
     * 获取产品的评论
     */
    private function getProductReviewAjax($item_id, $limit_from = 0, $limit_num = 0) {
        if (!$limit_num) {
            $limit_num = C('PAGE_SIZE') ? C('PAGE_SIZE') : 2;
        }

        $model_review = M('reviews');
        if ($limit_num) {
            $limit = $limit_from . ',' . $limit_num;
        } else {
            $limit = $limit_num;
        }
        $data = $model_review
                ->where(array('review_item_id' => intval($item_id), 'review_language' => $this->lang))
                ->field('review_id,review_title,review_content,review_item_id,review_create_time,review_create_userid,review_rate')
                ->limit($limit)
                ->select();

        return $data;
    }

    /**
     * 产品评论分页
     */
    public function reviewGotoPage() {
        $params = I('get.');
        $page = $params['page'];
        $current_page = $params['current_page'];
        $item_id = $params['item_id'];

        // 每页数目
        $page_size = C('PAGE_SIZE');
        // 总页数
        $count = M('reviews')->where(array('review_item_id' => $item_id))->count();
        $page_num = ceil($count / $page_size);
        if ($page > $page_num) {
            $this->ajaxReturn(
                    array(
                        'status' => false,
                        'data' => L('NO_MORE_REVIEWS')
            ));
        }
        switch ($page) {
            case 'next':
                $page = $current_page + 1;

                if ($page >= 2) {
                    if ($page_num < $page) {
                        return;
                    }
                    if ($page_num == $page && $page >= 3) {
                        $page_3 = $page;
                        $page_2 = $page - 1;
                        $page_1 = $page - 2;
                    } else {
                        $page_3 = $page + 1;
                        $page_2 = $page;
                        $page_1 = $page - 1;
                    }
                } else {
                    $page_3 = 3;
                    $page_2 = 2;
                    $page_1 = 1;
                }
                break;
            case 'prev':
                if ($current_page == 1) {
                    return;
                }
                $page = $current_page - 1;
                if ($page >= 2) {
                    $page_3 = $page + 1;
                    $page_2 = $page;
                    $page_1 = $page - 1;
                } else {
                    $page_3 = 3;
                    $page_2 = 2;
                    $page_1 = 1;
                }
                break;
            case 'first':
                $page = 1;
                $page_3 = 3;
                $page_2 = 2;
                $page_1 = 1;
                break;
            case 'last':
                $page = $page_num;
                if ($page >= 3) {
                    $page_3 = $page;
                    $page_2 = $page - 1;
                    $page_1 = $page - 2;
                } else {
                    $page_3 = 3;
                    $page_2 = 2;
                    $page_1 = 1;
                }
                break;
        }

        $data = $this->getProductReviewAjax($item_id, ($page - 1) * $page_size, $page_size);
        if (!$data) {
            return $this->ajaxReturn(
                            array(
                                'status' => false,
                                'data' => L('NO_MORE_REVIEWS')
                    ));
        }

        $this->assign('reviews', $data);
        $html = $this->fetch($params['tpl']);
        return $this->ajaxReturn(
                        array(
                            'status' => true,
                            'data' => array(
                                'current_page' => $page,
                                'page_3' => $page_3,
                                'page_2' => $page_2,
                                'page_1' => $page_1,
                                'html' => $html
                            )
                        )
        );
    }

}

?>
