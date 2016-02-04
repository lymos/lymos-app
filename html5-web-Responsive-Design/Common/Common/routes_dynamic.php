<?php

//动态路由
return array(
    //分类
    //"/^([a-z0-9\-]+)-c(\d+)$/i" => "Product/productList",
    //"/^([a-z0-9\-]+)-c(\d+)([a-z0-9\-\/]+)$/i" => "Product/productList",
    //"/^([a-z0-9\-]+)-c(\d+)([a-z0-9\-\/]+)\.html$/i" => "Product/productList",
    //产品
    "/^(.*)-p(\d+)$/i" => "Product/productDetail",
    "/^([a-z0-9\-]+)-p(\d+)$/i" => "Product/productDetail",
        //产品详情
        //'productinfo/:product_id' => 'Product/productDetail'
);
?>