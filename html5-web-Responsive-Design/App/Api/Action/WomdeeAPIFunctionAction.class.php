<?php

namespace Api\Action;

class WomdeeAPIFunctionAction extends DatabaseConnectionAction {

    public function __construct() {
        parent::__construct();
    }

    //增加listing 方法
    public function addListings($send_data) {
        //listing 表
        if (!empty($send_data)){
            $this->query("truncate table womdee_listings");
            $this->query("truncate table womdee_listings_baseinfo");
            $this->query("truncate table womdee_listings_detail");
            $ss = 0;
            $ff = 0;
            foreach ($send_data as $listingData) {
                $listingArr = array();
                $listingArr['item_code'] = $listingData['item_code'];
                $listingArr['category_id'] = $listingData['category_id'];
                $listingArr['item_sites'] = $listingData['item_sites'];
                $listingArr['sku_common_images'] = serialize($listingData['sku_common_images']);
                $result = $this->query("insert into womdee_listings (" . join(',', array_keys($listingArr)) . ") values ('" . join("','", array_values($listingArr)) . "')");
//            $result=1;
                if ($result) {
                    $itemID = $this->insertID;
                    //保存公共图片
                    if(!empty($listingData['save_common_images'])){
                        foreach($listingData['save_common_images'] as $save_common_images){
                            $this->getFile($save_common_images,$itemID,1);
                        }
                    }
                    //listing base info
                    foreach ($listingData['base_info'] as $base_info) {
                        $base_info_arr = array();
                        $base_info_arr['item_id'] = $itemID;
                        $base_info_arr['item_title'] = $base_info['item_title'];
                        $base_info_arr['item_description'] = $base_info['item_description'];
                        $base_info_arr['item_language'] = strtolower($base_info['item_language']);
                        $this->query("insert into womdee_listings_baseinfo (" . join(',', array_keys($base_info_arr)) . ") values ('" . join("','", array_values($base_info_arr)) . "')");
                    }
                    //listing details
                    foreach ($listingData['details'] as $listing_details) {
                        $listing_detail_arr = array();
                        $listing_detail_arr['item_id'] = $itemID;
                        $listing_detail_arr['sku'] = $listing_details['sku'];
                        $listing_detail_arr['sku_stock'] = $listing_details['sku_stock'];
                        $listing_detail_arr['sku_attribute_arrays'] = serialize($listing_details['sku_attribute_arrays']);
                        $listing_detail_arr['sku_images'] = serialize($listing_details['sku_images']);
                        $this->query("insert into womdee_listings_detail (" . join(',', array_keys($listing_detail_arr)) . ") values ('" . join("','", array_values($listing_detail_arr)) . "')");
                        if(!empty($listing_details['save_images'])){
                            foreach($listing_details['save_images'] as $save_images){
                                $this->getFile($save_images,$itemID);
                            }
                        }
                    }
                    $ss++;
                } else {
                    $ff++;
                }
            }
            return $this->getMessage(1, 'add listings success' . $ss . '个，failure' . $ff . '个');
        }else{
            return $this->getMessage(0, 'add listings failure, input data is empty', $send_data);
        }
    }

    //修改或添加
    public function updateListings($send_data) {
        //listing 表
        if (!empty($send_data)){
            $ss = 0;
            $ff = 0;
            foreach ($send_data as $listingData) {
                $is_update=0;
                $listingArr = array();
                $listingArr['item_code'] = $listingData['item_code'];
                $listingArr['category_id'] = $listingData['category_id'];
                $listingArr['item_status'] = empty($listingData['item_status'])?1:$listingData['item_status'];
                $listingArr['item_sites'] = $listingData['item_sites'];
                $listingArr['sku_common_images'] = serialize($listingData['sku_common_images']);
                $is_exist=$this->getRecordOne("select * from womdee_listings where item_code = '".$listingArr['item_code']."'");
                if(count($is_exist)>0){
                    $is_update=1;
                    $result = $this->query("update womdee_listings set category_id = '".$listingArr['category_id']."',item_status='".$listingArr['item_status']."',item_sites='".$listingArr['item_sites']."',sku_common_images='".$listingArr['sku_common_images']."'  where item_code = '".$listingArr['item_code']."'");
                }else{
                    $result = $this->query("insert into womdee_listings (" . join(',', array_keys($listingArr)) . ") values ('" . join("','", array_values($listingArr)) . "')");
                }
//            $result=1;
                if ($result) {
                    $itemID = $is_update==1?$is_exist['item_id']:$this->insertID;
                    //保存公共图片
                    if(!empty($listingData['save_common_images'])){
                        foreach($listingData['save_common_images'] as $save_common_images){
                            $this->getFile($save_common_images,$itemID,1);
                        }
                    }
                    //listing base info
                    foreach ($listingData['base_info'] as $base_info) {
                        $base_info_arr = array();
                        $base_info_arr['item_id'] = $itemID;
                        $base_info_arr['item_title'] = $base_info['item_title'];
                        $base_info_arr['item_description'] = $base_info['item_description'];
                        $base_info_arr['item_language'] = strtolower($base_info['item_language']);
                        if($is_update){
                            $is_exist_language = $this->getRecordOne("select * from womdee_listings_baseinfo where item_id = '".$itemID."' and item_language='".$base_info_arr['item_language']."'");
                            if(count($is_exist_language)>0){
                                $this->query("update womdee_listings_baseinfo set item_title= '".addslashes($base_info_arr['item_title'])."',item_description='".addslashes($base_info_arr['item_description'])."' where item_id = '".$itemID."' and item_language='".$base_info_arr['item_language']."'");
                            }else{
                                $this->query("insert into womdee_listings_baseinfo (" . join(',', array_keys($base_info_arr)) . ") values ('" . join("','", array_values($base_info_arr)) . "')");
                            }
                        }else{
                            $this->query("insert into womdee_listings_baseinfo (" . join(',', array_keys($base_info_arr)) . ") values ('" . join("','", array_values($base_info_arr)) . "')");
                        }
                    }
                    //listing details
                    foreach ($listingData['details'] as $listing_details) {
                        $listing_detail_arr = array();
                        $listing_detail_arr['item_id'] = $itemID;
                        $listing_detail_arr['sku'] = $listing_details['sku'];
                        $listing_detail_arr['sku_stock'] = $listing_details['sku_stock'];
                        $listing_detail_arr['sku_attribute_arrays'] = serialize($listing_details['sku_attribute_arrays']);
                        $listing_detail_arr['sku_images'] = serialize($listing_details['sku_images']);
                        if($is_update){
                            $is_exist_details = $this->getRecordOne("select * from womdee_listings_detail where item_id = '".$itemID."' and sku = '".$listing_detail_arr['sku']."'");
                            if(count($is_exist_details)>0){
                                $this->query("update womdee_listings_detail set sku_stock = '".$listing_detail_arr['sku_stock']."',sku_attribute_arrays = '".$listing_detail_arr['sku_attribute_arrays']."',sku_images = '".$listing_detail_arr['sku_images']."' where item_id = '".$itemID."' and sku = '".$listing_detail_arr['sku']."'");
                            }else{
                                $this->query("insert into womdee_listings_detail (" . join(',', array_keys($listing_detail_arr)) . ") values ('" . join("','", array_values($listing_detail_arr)) . "')");
                            }
                        }else{
                            $this->query("insert into womdee_listings_detail (" . join(',', array_keys($listing_detail_arr)) . ") values ('" . join("','", array_values($listing_detail_arr)) . "')");
                        }
                        if(!empty($listing_details['save_images'])){
                            foreach($listing_details['save_images'] as $save_images){
                                $this->getFile($save_images,$itemID);
                            }
                        }
                    }
                    $ss++;
                } else {
                    $ff++;
                }
            }
            return $this->getMessage(1, 'update listings success' . $ss . '个，failure' . $ff . '个');
        }else{
            return $this->getMessage(0, 'update listings failure, input data is empty', $send_data);
        }
    }
    //修改 listing 信息
    public function updateListings1($send_data) {
        if (!empty($send_data['type'])) {
            if ($send_data['type'] == 'listings') {
                $update_table = 'womdee_listings';
                $update_arr = array();
                foreach ($send_data['data'] as $key => $val) {
                    $update_arr[] = $key . " = " . "'" . $val . "'";
                }
                $where_arr = array('item_id' => $send_data['item_id']);
            }
            if ($send_data['type'] == 'base_info') {
                $update_table = 'womdee_listings_baseinfo';
                $update_arr = array();
                foreach ($send_data['data'] as $key => $val) {
                    $update_arr[] = $key . " = " . "'" . $val . "'";
                }
                $where_arr = array('item_id' => $send_data['item_id'], 'item_language' => $send_data['item_language']);
            }
            if ($send_data['type'] == 'listings_detail') {
                $update_table = 'womdee_listings_detail';
                $update_arr = array();
                foreach ($send_data['data'] as $key => $val) {
                    $update_arr[] = $key . " = " . "'" . $val . "'";
                }
                $where_arr = array('item_id' => $send_data['item_id'], 'sku' => $send_data['sku']);
            }
            $this->query("update $update_table set " . join(',', $update_arr) . " where " . join(' and ', $where_arr) . "");
            return $this->getMessage(1, 'update listings ' . $send_data['type'] . ' success');
        } else {
            return $this->getMessage(0, 'update listings ' . $send_data['type'] . ' failure,type is empty', $send_data);
        }
    }

    //删除listing
    public function deleteListings($send_data) {
        if (!empty($send_data)) {
            if(empty($send_data['sku'])){
                $result = $this->query("update womdee_listings set item_status = 0 where item_code = '" . $send_data['item_code'] . "'");
                if($result){
                    $item_data = $this->getRecordOne("select * from womdee_listings where item_code = '" . $send_data['item_code'] . "'");
                    $result = $this->query("update womdee_listings_detail set sku_status = 0 where item_id = '" . $item_data['item_id'] . "'");
                }
            }else{
                $result = $this->query("update womdee_listings set item_status = 0 where item_code = '" . $send_data['item_code'] . "'");
                if($result){
                    $item_data = $this->getRecordOne("select * from womdee_listings where item_code = '" . $send_data['item_code'] . "'");
                    $result = $this->query("update womdee_listings_detail set sku_status = 0 where item_id = '" . $item_data['item_id'] . "' and sku = '".$send_data['sku']."'");
                }
            }
            if ($result) {
                return $this->getMessage(1, 'delete listings success');
            } else {
                return $this->getMessage(0, 'delete listings failure', $send_data);
            }
        } else {
            return $this->getMessage(0, 'delete listings failure, item_id is empty', $send_data);
        }
    }

    //增加 属性
    public function addAttributes($send_data) {
        if (!empty($send_data)) {
            $this->query("truncate table womdee_attributes");
            $this->query("truncate table womdee_attributes_values");
            $ss=0;
            $ff=0;
            $main_ss=0;
            $main_ff=0;
            foreach ($send_data as $attribute_all_data) {
                $attribute_title_language_arr=array();
                foreach($attribute_all_data['attribute_title_language'] as $attribute_title_language=>$attribute_title){
                    $attribute_title_language_arr['attribute_title_' . strtolower($attribute_title_language)] = $attribute_title;
                }
                $detail_result = $this->query("insert into womdee_attributes (" . join(',', array_keys($attribute_title_language_arr)) . ") values ('" . join("','", array_values($attribute_title_language_arr)) . "')");
//                $detail_result=1;
                if ($detail_result){
                    $main_ss++;
                    $attribute_id = $this->insertID;

                    foreach($attribute_all_data['attribute_values'] as $attribute_values_details){
                        $attribute_values_details_arr=array();
                        foreach($attribute_values_details['attribute_value_language'] as $attribute_value_language=>$attribute_value){
                            $attribute_values_details_arr['attribute_value_' . strtolower($attribute_value_language)] = $attribute_value;
                        }
                        $attribute_values_details_arr['attribute_id']=$attribute_id;
                        $attribute_values_details_arr['attribute_value_block_color']= empty($attribute_values_details['attribute_value_block_color'])? ' ':$attribute_values_details['attribute_value_block_color'];
                        $attribute_values_details_arr['attribute_value_block_image']= empty($attribute_values_details['attribute_value_block_image'])? ' ':$attribute_values_details['attribute_value_block_image'];
                        $attributes_values_result = $this->query("insert into womdee_attributes_values (" . join(',', array_keys($attribute_values_details_arr)) . ") values ('" . join("','", array_values($attribute_values_details_arr)) . "')");
                        if($attributes_values_result){
                            $ss++;
                        }else{
                            $ff++;
                        }
                    }
                }else{
                    $main_ff++;
                }
            }
            return $this->getMessage(1, 'add attributes success, add attributes total '.($main_ss+$main_ff).', success'.$main_ss.',failure'.$main_ff.';attributes values total '.($ss+$ff).', success'.$ss.',failure'.$ff, $send_data);
        } else {
            return $this->getMessage(0, 'add attributes failure, input data is empty', $send_data);
        }
    }

    //修改 属性
    public function updateAttributes($send_data) {
        if (!empty($send_data)) {
            if ($send_data['type'] == 'attribute_title_language') {
                $attribute_arr = array();
                foreach ($send_data['attribute_title_language'] as $key => $val) {
                    $attribute_arr[] = 'attribute_title_' . strtolower($key) . " = " . "'" . $val . "'";
                }
                $result = $this->query("update womdee_attributes set " . join(',', $attribute_arr) . " where attribute_id = {$send_data['attribute_id']} ");
            }
            if ($send_data['type'] == 'attribute_values') {
                $attribute_values_arr = array();
                foreach ($send_data['attribute_value_language'] as $key => $value_details) {
                    $attribute_values_arr[] = 'attribute_value_' . strtolower($key) . " = " . "'" . $value_details . "'";
                }
                $result = $this->query("update womdee_attributes_values set " . join(',', $attribute_values_arr) . " where attribute_value_id = {$send_data['attribute_value_id']}");
            }
            if ($result) {
                return $this->getMessage(1, 'update attributes success');
            } else {
                return $this->getMessage(0, 'update attributes failure');
            }
        } else {
            return $this->getMessage(0, 'update attributes failure, input data is empty', $send_data);
        }
    }

    //删除 属性
    public function deleteAttributes($send_data) {
        if (!empty($send_data)) {
            $result = $this->query("delete from womdee_attributes where attribute_id = '" . $send_data['attribute_id'] . "'");
            if ($result) {
                $result = $this->query("delete from womdee_attributes_values where attribute_id = '" . $send_data['attribute_id'] . "'");
                if ($result) {
                    return $this->getMessage(1, 'delete attributes success');
                } else {
                    return $this->getMessage(0, 'delete attributes values failure', $send_data);
                }
            } else {
                return $this->getMessage(0, 'delete attributes failure', $send_data);
            }
        } else {
            return $this->getMessage(0, 'delete attributes failure, attribute_id is empty', $send_data);
        }
    }
    //删除属性值
    public function deleteAttributesValues($send_data) {
        if (!empty($send_data)) {
            $result = $this->query("delete from womdee_attributes_values where attribute_value_id = '" . $send_data['attribute_value_id'] . "'");
            if ($result) {
                return $this->getMessage(1, 'delete attributes values success');
            } else {
                return $this->getMessage(0, 'delete attributes values failure', $send_data);
            }
        } else {
            return $this->getMessage(0, 'delete attributes failure, attribute_id is empty', $send_data);
        }
    }

    //分类 存储
    public function saveCategory($send_data) {
        if (!empty($send_data)) {
            $this->query("truncate table womdee_category");
            $this->query("truncate table womdee_category_details");
            $this->loopCategory(0, $send_data);
            return $this->getMessage(1, 'save category success');
        } else {
            return $this->getMessage(0, 'save category failure, input data is empty', $send_data);
        }
    }

    //递归 分类
    public function loopCategory($parent_category_id, $child_category_arr) {
        if (!empty($child_category_arr)) {
            $category_sort=0;
            foreach ($child_category_arr as $categoryData) {
                $parent_category_arr = array();
                $category_sort++;
                $parent_category_arr['category_logo'] = empty($categoryData['category_logo'])? ' ':$categoryData['category_logo'];
                $parent_category_arr['parent_id'] = $categoryData['parent_id'];
                $parent_category_arr['category_id'] = $categoryData['category_id'];
//                $parent_category_arr['parent_id'] = $parent_category_id;
                $parent_category_arr['category_sort'] = $category_sort;
                $result = $this->query("insert into womdee_category (" . join(',', array_keys($parent_category_arr)) . ") values ('" . join("','", array_values($parent_category_arr)) . "')");
                if ($result) {
//                    $category_id = $this->insertID;
                    $category_id = $categoryData['category_id'];
                    foreach ($categoryData['category_details'] as $categoryDetails) {
                        $category_details_arr = array();
                        $category_details_arr['category_id'] = $category_id;
                        $category_details_arr['category_title'] = $categoryDetails['category_title'];
                        $category_details_arr['category_language'] = strtolower($categoryDetails['category_language']);
                        $this->query("insert into womdee_category_details (" . join(',', array_keys($category_details_arr)) . ") values ('" . join("','", array_values($category_details_arr)) . "')");
                    }
                    if (!empty($categoryData['child_category'])) {
                        $this->loopCategory($category_id, $categoryData['child_category']);
                    }
                }
            }
        }
    }

}