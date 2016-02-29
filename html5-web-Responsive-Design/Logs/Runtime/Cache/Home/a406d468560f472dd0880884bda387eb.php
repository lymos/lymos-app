<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="Keywords" content="ANKER">
        <meta name="Description" content="We created tackling first-world problems like low battery and slow data access to make life better">
        <title>womdee product list</title>
        <link rel="stylesheet" type="text/css" href="/css/inner.css" />
    </head>
    <body>
    <link rel="stylesheet" type="text/css" href="/css/nav.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<script src="/js/jquery19.js"></script>
<script src="/js/home.js"></script>
<div class="search-box">
    <form action="/Product/productSearch" method="get">

        <input type="text" name="search_key">
        <button type="submit" style="cursor: pointer; background-color: #a15d03; color: #fff; padding: 8px 12px;"><?php echo L('BTN_SEARCH');?></button>

    </form>
</div>
<div id="nav">
    <div id="navWrap">
        <a href="/" id="navLogo"><img src="/image/logo.png"></a>
        <div class="pr" id="navRight" style="text-align: right;">
            <span class="t-muted" id="navNotLogin">
                <?php if(empty($username)): ?><a href="/login.html"><?php echo L('BTN_LOGIN');?></a><span> / </span>
                    <a href="/register.html"><?php echo L('BTN_REGISTER');?></a>
                    <?php else: ?>
                    <a href="/"><?php echo ($username); ?></a><span> / </span>
                    <a href="/logout.html"><?php echo L('BTN_LOGOUT');?></a><?php endif; ?>
            </span>
            <span class="p-png-search p-btn-show-search"><img style="vertical-align:bottom; cursor: pointer;" src="/image/search.png" title="search"></span>
            <span class="png-search btn-show-search"></span>
            <span class="ml30" id="nav-control" onclick="ShowMenu();" style="vertical-align: top;"><i class="icon-align-justify" style="font-size:16px;"><em>≡</em></i></span>
        </div>
        <div class="m-search-box">
            <form action="/Product/productSearch" method="get">
                <input type="text" name="search_key">
                <button type="submit" style="cursor: pointer; background-color: #a15d03; color: #fff"><?php echo L('BTN_SEARCH');?></button>
            </form>
        </div>
        <ul id="navMain">
            <?php if(is_array($category_menu)): $i = 0; $__LIST__ = $category_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i; if(!empty($menu['child_category'])): ?><li class="has-more">
                        <a class="nolink" href="<?php echo ($menu['url']); ?>" style="margin-right: 100px;"><?php echo ($menu['category_title']); ?> </a>
                        <label class="btn-more">more</label>
                        <ul class="nav-sub1">
                            <?php if(is_array($menu['child_category'])): $i = 0; $__LIST__ = $menu['child_category'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child_menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="nolink" href="<?php echo ($child_menu['url']); ?>"><?php echo ($child_menu['category_title']); ?></a>
                                    <!--
                                    <div class="nav-sub2-cover">
                                        <div class="nav-power">
                                            <a href="<?php echo ($child_menu['url']); ?>">
                                                <img src="/img/navPowerIQ.png">
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <ul class="nav-sub2">
                                        <?php if(is_array($child_menu['child_category'])): $i = 0; $__LIST__ = $child_menu['child_category'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child_child_menu): $mod = ($i % 2 );++$i;?><li>
                                                <a href="<?php echo ($child_child_menu['url']); ?>">
                                                    <img src="/img/nav/external_batteries.jpg">
                                                    <p>
                                                        <?php echo ($child_child_menu['category_title']); ?>
                                                    </p>
                                                </a>
                                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                    -->
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li><a class="nolink" href="<?php echo ($menu['url']); ?>"><?php echo ($menu['category_title']); ?> </a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <div class="nav-sub1-cover"></div>
        </ul>
    </div>
</div>
<div class="cb" id="navGap"></div>
    <div class="wrap">
        <div class="block">
            <div class="position">
                <?php echo L('LABEL_YOUR_POSITION');?> <a href="/" rel="nofollow"><?php echo L('LABEL_HOME');?></a>
                <?php if(is_array($category_array)): $i = 0; $__LIST__ = $category_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category_val): $mod = ($i % 2 );++$i;?>&nbsp;<code>&gt;</code>
                    <h1><a href="<?php echo ($category_val['url']); ?>"><?php echo ($category_val['category_title']); ?></a></h1><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="cut_line">
                <span class="left_line"></span><span class="right_line"></span>
            </div>
            <div class="sidebar">
                <div class="sidebox">
                    <p class="sidebar_title">Hot Sellers</p>
                    <div class="line">
                        <span class="left_line"></span><span class="right_line"></span>
                    </div>
                    <ul class="hot_list">
                        <?php if(is_array($hot_product)): foreach($hot_product as $key=>$rs): ?><li>
                                <a href="<?php echo product_url($rs['item_title'],$rs['item_id']);?>">
                                    <span class="hot_list_pic">
                                        <img src="/image_create.php?big_img=<?php echo ($rs['image_sku']); ?>&item_id=<?php echo ($rs['item_id']); ?>&size=hot_list">
                                    </span>
                                    <?php echo ($rs['item_title']); ?>
                                </a>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
            <div class="mainbar clearfix">
                <ul class="product_slider pslider_list">
                    <?php if(is_array($product)): foreach($product as $key=>$rs): ?><li class="product_slider_item">
                            <div class="product_slider_item_pic prodict-img">
                                <a href="<?php echo product_url($product_detail[$rs['item_id']],$rs['item_id']);?>" title="<?php echo ($product_detail[$rs['item_id']]); ?>">
                                    <img src="/image_create.php?big_img=<?php echo ($rs['image_sku']); ?>&item_id=<?php echo ($rs['item_id']); ?>&size=product_list" alt="<?php echo ($product_detail[$rs['item_id']]); ?>">
                                </a>
                            </div>
                            <div class="product_slider_item_txt prodict-text">
                                <h3>
                                    <a href="<?php echo product_url($product_detail[$rs['item_id']],$rs['item_id']);?>" title="<?php echo ($product_detail[$rs['item_id']]); ?>"><?php echo ($product_detail[$rs['item_id']]); ?></a>
                                </h3>
                                <p></p>
                                <?php if(is_array($attr_detail[$rs['item_id']])): foreach($attr_detail[$rs['item_id']] as $attr_name=>$attr): ?><p style="padding-top: 4px;">
                                        <label><?php echo ($attr_name); ?>: </label>
                                        <?php if(is_array($attr)): foreach($attr as $key=>$val): ?><span><?php echo ($val); ?>&nbsp;&nbsp;</span><?php endforeach; endif; ?>
                                    </p><?php endforeach; endif; ?>
                                
                            </div>
                        </li><?php endforeach; endif; ?>
                </ul>
                <?php if($no_search_product == true): ?><p><?php echo L('NO_RESULT_FOR_YOU');?></p><?php endif; ?>
                <?php if($device != 'pc'): ?><p class="tc">
                        <span class="loading">
                            <img src="/image/loading.gif">
                        </span>

                        <a class="btn_more_product" cate-id="<?php echo ($_GET['cateid']); ?>" page="1" href="javascript:void(0);"><?php echo L('LOAD_MORE');?></a>
                    </p>
                    <?php else: ?>
                    <?php echo ($page_show); endif; ?>
            </div>
        </div>
        <div class="footer_top clearfix">
    <div class="block">
        Contact us: <a href="mailto:service@womdee.com">service@womdee.com</a> 
    </div>
</div>
<div class="footer clearfix">
    <div class="wrap">
        <div class="block clearfix">
            <div class="footer_link clearfix">
                <dl>
                    <dt class="btn-toggle-foot"><?php echo L('LABEL_BEST_SELLERS');?></dt>
                    <?php if(is_array($foot_bestseller)): foreach($foot_bestseller as $key=>$rs): ?><dd><a href="<?php echo product_url($rs['item_title'],$rs['item_id']);?>"><?php echo ($rs['item_code']); ?></a></dd><?php endforeach; endif; ?>
                </dl>
                <dl>
                    <dt class="btn-toggle-foot">Company Info</dt>
                    <dd><a href="/about-us.html">About us</a></dd>
                    <dd><a href="/terms-conditions.html">Terms & Conditions</a></dd>
                    <dd><a href="/privacy-security-policy.html">Privacy & Security Policy</a></dd>
                </dl>
                <dl>
                    <dt class="btn-toggle-foot">Quick Links</dt>
                    <dd class="active"><a href="/how-to-order.html">How to order</a></dd>
                    <dd class="active"><a href="/size-and-fit-guides.html">Size and Fit Guides</a></dd>
                    <dd class="active"><a href="/wholesale.html">Wholesale</a></dd>
                    <dd class="active"><a href="/i-try-blogger.html">I-Try Blogger</a></dd>
                </dl>
                <dl>
                    <dt class="btn-toggle-foot">Customer Service</dt>
                    <dd><a href="/contact-us.html">Contact Us</a></dd>
                    <dd><a href="/return-policy.html">Returns Policy</a></dd>
                </dl>
            </div>
            <div class="footer_info">
                <div class="show_language">
                    <p><?php echo L('LABEL_SELECT_LANG');?></p>
                    <div class="language btn_language">
                        <?php switch(strtoupper($country_code)){ case 'US': $yy = 0; break; case 'CA': $yy = -130; break; case 'JP': $yy = -105; break; case 'DE': $yy = -51.8; break; case 'IT': $yy = -26.4; break; case 'GB': $yy = -78; break; } ?>
                        <span style="padding-left: 28px; padding-top: 6px; margin-top: 2px; padding-bottom: 4px; background-image: url('/image/country_icon.png'); background-repeat: no-repeat; background-position: 0 <?php echo ($yy); ?>px;"><?php echo ($lang_data['listing_site_country']); ?></span>
                        <ul class="language_list">
                            <?php if(is_array($site_datas)): foreach($site_datas as $key=>$site_vall): switch(strtoupper($key)){ case 'US': $y = 3; break; case 'CA': $y = -130; break; case 'JP': $y = -105; break; case 'DE': $y = -51.2; break; case 'IT': $y = -24; break; case 'GB': $y = -76.8; break; } ?>
                                <li class="country-code" style="padding-left: 28px; background-image: url('/image/country_icon.png'); background-repeat: no-repeat; background-position: 0 <?php echo ($y); ?>px;">
                                    <a  href="javascript:void(0);" onclick="ChangeLanguage('<?php echo ($site_vall["listing_site_language"]); ?>','<?php echo ($site_vall["listing_site_name"]); ?>');"><?php echo ($site_vall['listing_site_country']); ?></a>
                                </li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="wom-copyright" style="border-top:1px solid #cccccc;">
            <p>Copyright © 2016 Womdee Technology Co., Ltd.</p>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/jquery19.js"></script>
<script type="text/javascript" src="/js/basic.js"></script>
</body>
</html>