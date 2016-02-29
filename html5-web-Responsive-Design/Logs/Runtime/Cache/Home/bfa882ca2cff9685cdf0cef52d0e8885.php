<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="Keywords" content="WOMDEE">
        <meta name="Description" content="We created tackling first-world problems like low battery and slow data access to make life better">
        <meta name="title" content="<?php echo ($product_baseinfo['item_title']); ?>">
        <title><?php echo ($product_baseinfo['item_title']); ?></title>
        <link rel="stylesheet" type="text/css" href="/css/inner.css" />
    </head>
    <body>
    <?php if(is_array($product_img)): $i = 0; $__LIST__ = $product_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img_val): $mod = ($i % 2 );++$i;?><div class="lg-img" id="lg-img-<?php echo ($key); ?>">
            <img src="/image_create.php?big_img=<?php echo ($img_val); ?>&item_id=<?php echo ($item_id); ?>&size=large">
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
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
    <div class="block clearfix">
        <div class="position">Your Position:
            <a href="/" rel="nofollow">Home</a>
            <?php if(is_array($category_array)): $i = 0; $__LIST__ = $category_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category_val): $mod = ($i % 2 );++$i;?>&nbsp;<code>&gt;</code>
                <h1><a href="<?php echo ($category_val['url']); ?>"><?php echo ($category_val['category_title']); ?></a></h1><?php endforeach; endif; else: echo "" ;endif; ?>
            <code>&gt;</code>
            <h1><a href="<?php echo product_url($product_baseinfo['item_title'],$item_id);?>"><?php echo ($product_baseinfo['item_title']); ?></a></h1>
        </div>
        <div class="cut_line">
            <span class="left_line"></span>
            <span class="right_line"></span>
        </div>
        <div temscope="" class="product_item clearfix">
            <div class="product_item_pic_wrapper">
                <div class="pic_base" id="touch-move">
                    <?php if(is_array($product_img)): $i = 0; $__LIST__ = $product_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img_val): $mod = ($i % 2 );++$i;?><img style="cursor: move;"  sid="<?php echo ($key); ?>" style="margin: 0 auto;" class="show-big <?php if($key == 0): ?>active<?php endif; ?>" src="/image_create.php?big_img=<?php echo ($img_val); ?>&item_id=<?php echo ($item_id); ?>&size=product_detail" id="pic_<?php echo ($key); ?>" itemprop="photo"><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="pic_small_img">
                    <label class="img-prev" ><</label>
                    <div class="img-wrap">
                    <?php if(is_array($product_img)): $i = 0; $__LIST__ = $product_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img_val): $mod = ($i % 2 );++$i;?><span <?php if($key == 0): ?>class="hover"<?php endif; ?> sid="pic_<?php echo ($key); ?>"><!--<b></b>--><img src="/image_create.php?big_img=<?php echo ($img_val); ?>&item_id=<?php echo ($item_id); ?>&size=detail_min"></span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <input class="img-num" type="hidden" value="<?php echo count($product_img); ?>">
                    <label class="img-next">></label>
                </div>
            </div>
            <div class="product_item_wrapper">
                <h3 itemprop="itemreviewed" class="s_title"><?php echo ($product_baseinfo['item_title']); ?></h3>
                <ul class="product_item_wrapper_info">

                    <li itemscope="" itemprop="rating" class="product_items_li quick_li">
                        <div id="fixed" class="star"><div></div></div>
                        <span class="q_reviews">
                            Score : <em itemprop="average"><?php echo ($reviews_agv); ?></em>&nbsp;&nbsp;&nbsp;(<a title="See all reviews" href="#ptop" class="quick_reviews"><em itemprop="count"><?php echo ($reviews_count); ?></em> Customer Reviews</a>)
                        </span>
                        <p class="q_infos">
                            <span><a class="quick_write" href="#review_form">Write a review</a></span>
                            <span>|</span>
                            <span><a class="quick_show_product_info" href="#ptop">Show Product Information</a></span>
                        </p>
                    </li>
                    <?php if(is_array($product_attr)): foreach($product_attr as $attr_key=>$attr_val): ?><li class="product_items_li">
                            <dl class="item_prop">
                                <dt><?php echo ($attr_key); ?>:</dt>
                                <?php if(is_array($attr_val)): foreach($attr_val as $key=>$attr_row): ?><dd style="position: relative;">
                                    <?php if(strtoupper($attr_key) == 'COLOR'): ?><em class="black_bg choose_color btn_choose_color" style="background:<?php echo str_replace(' ', '', $attr_row); ?>" title="<?php echo ($attr_row); ?>" type="color"></em>
                                        <?php else: ?>
                                        <em class="black_bg choose_color btn_choose_color" type="size"><?php echo ($attr_row); ?></em><?php endif; ?>
                                    </dd><?php endforeach; endif; ?>
                            </dl>
                        </li><?php endforeach; endif; ?>
                    <li itemscope="" itemprop="rating" class="product_items_li">
                        Asin: <span class="asin-code"></span>
                    </li>
                    <!--                    <li class="product_items_li">
                                            <dl class="cyc" id="market_list">
                                                <dt>Choose your country:</dt>
                                                <?php if(is_array($site_data)): $i = 0; $__LIST__ = $site_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$site_row): $mod = ($i % 2 );++$i;?><dd><a href="javascript:void(0);" onClick="set_active(this,true)" class="ec" id="amazon" url="" ><?php echo ($site_row['listing_site_name']); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </dl>
                                        </li>-->
                    <li class="product_items_li Err"><?php echo L('NO_THIS_PRODUCT');?></li>
                    <li class="product_items_li ErrorText"><?php echo L('CHOOSE_ATTR');?></li>
                    <li class="product_items_li btn-buy">
                    <?php if(!empty($site_data)): ?><a onClick="trun_url(this)" s-href="<?php echo ($site_data['listing_site_url']); ?>/dp/<?php echo ($product_list['item_code']); ?>" href="javascript: void(0);" rel="nofollow" id="buynow" class="buyamazon piwi_btn"><?php $site_len = strlen($site_data['listing_site_url']); ?>Buy At <?php echo (substr($site_data['listing_site_url'],12,$site_len)); ?></a>
                        <?php else: ?>
                        <span class="buyamazon_no piwi_btn"><?php echo L('BUY_AMAZON');?></span><?php endif; ?>
                    </li>
                    <li class="product_items_li">
                        <div class="share-link" style="box-sizing: border-box; padding-left: 68px;">
                            <label style="position: absolute; top: 12px; left: 0;">Share To: </label>
                            <a class="gg" href="https://plus.google.com/share?url=<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" target="_blank" style="margin-right: 12px;"><img style="height: 40px; width: 40px;" src="/image/google_share.png"></a>
                            <a class="fb" href="http://www.facebook.com/share.php?u=<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" target="_blank"><img style="height: 40px; width: 40px;" src="/image/facebook_share.png"></a>
                        </div>
                    </li>
                    <li class="product_items_li">
                        <div class="addthis_toolbox addthis_default_style">
                            <a style="position:relative; width:80px;" fb:like:layout="button_count" class="addthis_button_facebook_like"></a>
                            <a style="position:relative;width:96px; height: 20px;" class="addthis_button_tweet"></a>
                            <a pi:pinit:layout="horizontal" style="position:relative;width:90px;height:25px;" class="addthis_button_pinterest_pinit"></a>
                            <a style="position:relative;" class="addthis_counter addthis_pill_style"></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <a id="ptop" style="padding-top:100px;"></a>
    </div>
    <div id="hrefTag"></div>
    <div class="wrapper_box clearfix">
        <ul class="product_slider_nav">
            <li id="dpTitle2" class="product_slider_nav_li product_info_btn <?php if($is_review_refer == 1): ?>hover<?php endif; ?>">
                <span>Product Description</span>
            </li>
            <li id="reviewsTitle2" class="product_slider_nav_li customer_reviews_btn <?php if($is_review_refer == 2): ?>hover<?php endif; ?>">
                <span>Customer Reviews</span>
            </li>
            <li id="faqTitle2" class="product_slider_nav_li">
                <span>Customer FAQ</span>
            </li>
            <li id="see_alsoTitle2" class="product_slider_nav_li">
                <span>You may also like</span>
            </li>
        </ul>
        <div class="wrap">
            <h4 id="dpTitle" class="small_screen_title">Product Description</h4>
            <div class="wrapper_block prdouct_descirption_wrapper clearfix <?php if($is_review_refer == 1): ?>show_block<?php endif; ?>">
                <div class="pd_item_box content_text clearfix">
                    <div style="margin-bottom: 16px; padding-left: 12px; box-sizing: border-box;">
                        <?php $short_ar = explode('<br>', $product_baseinfo['item_short_description']); ?>
                        <ul style="list-style-type: disc;">
                        <?php if(is_array($short_ar)): foreach($short_ar as $key=>$short_val): if(!empty($short_val)): ?><li style="list-style-type: disc; font-size: 14px;"><?php echo ($short_val); ?></li><?php endif; endforeach; endif; ?>
                        </ul>
                    </div>
                    <div class="pd_item_txt_content"><?php echo ($product_baseinfo['item_description']); ?></div>
                </div>
            </div>
            <h4 class="small_screen_title" id="review_screen_title">Customer Reviews</h4>
            <div class="wrapper_block borderTop reviews_wrapper clearfix <?php if($is_review_refer == 2): ?>show_block<?php endif; ?>" <?php if($is_review_refer == 2): ?>style="display: block"<?php endif; ?>>
                <div class="reviews block">
                    <div class="reviews_info_box clearfix">
                        <span class="loading pc-review">
                            <img src="/image/loading.gif">
                        </span>
                        <div id="reviews_box">
                            <?php if(is_array($reviews)): foreach($reviews as $key=>$rs): ?><div class="review-item">
                                <p>
                                    <span class="star small">
                                        <?php switch($rs['review_rate']): case "5": ?><span class="active" star="1"></span>
                                                    <span class="active" star="2"></span>
                                                    <span class="active" star="3"></span>
                                                    <span class="active" star="4"></span>
                                                    <span class="active" star="5"></span><?php break;?>
                                                <?php case "4": ?><span class="active" star="1"></span>
                                                    <span class="active" star="2"></span>
                                                    <span class="active" star="3"></span>
                                                    <span class="active" star="4"></span>
                                                    <span class="" star="5"></span><?php break;?>
                                                <?php case "3": ?><span class="active" star="1"></span>
                                                    <span class="active" star="2"></span>
                                                    <span class="active" star="3"></span>
                                                    <span class="" star="4"></span>
                                                    <span class="" star="5"></span><?php break;?>
                                                <?php case "2": ?><span class="active" star="1"></span>
                                                    <span class="active" star="2"></span>
                                                    <span class="" star="3"></span>
                                                    <span class="" star="4"></span>
                                                    <span class="" star="5"></span><?php break;?>
                                                <?php case "1": ?><span class="active" star="1"></span>
                                                    <span class="" star="2"></span>
                                                    <span class="" star="3"></span>
                                                    <span class="" star="4"></span>
                                                    <span class="" star="5"></span><?php break;?>
                                                <?php case "0": ?><span class="" star="1"></span>
                                                    <span class="" star="2"></span>
                                                    <span class="" star="3"></span>
                                                    <span class="" star="4"></span>
                                                    <span class="" star="5"></span><?php break; endswitch;?>
                                    </span>
                                    <span class="review-title"><?php echo ($rs['review_title']); ?></span>
                                </p>
                                <p>
                                    <span class="gray-light">By </span><span class="review-by"><?php echo ($rs['review_create_username']); ?></span>  <span class="gray-light">on <?php echo (substr($rs['review_create_time'],0,16)); ?></span>
                                </p>
                                <p>
                                    <?php echo ($rs['review_content']); ?>
                                </p>
                            </div><?php endforeach; endif; ?>
                              
                        </div>
                        <?php if($device != 'pc'): ?><p class="tc">
                                <span class="loading">
                                    <img src="/image/loading.gif">
                                </span>
                                <a class="btn_more_product_review" data-target="#reviews_box" page="1" href="javascript:void(0);"><?php echo L('LOAD_MORE');?></a>
                                <input type="hidden" class="item_id" value="<?php echo ($item_id); ?>">
                                <input type="hidden" class="tpl_file" value="product_review_box_item">
                            </p>
                            <?php else: ?>
                            <?php if(!empty($reviews)): ?><div class="pagelist" id="comment_pages">
                                    <input type="hidden" class="item_id" value="<?php echo ($item_id); ?>">
                                    <input type="hidden" class="review_sum_pages" value="<?php echo ($review_sum_pages); ?>">
                                    <input type="hidden" class="tpl_file" value="product_review_box_item">
                                    <?php switch($review_sum_pages): case "1": break;?>
                                        <?php case "2": ?><a class="btn_page_review" page="first" href="#ptop">&lt;&lt;</a>
                                            <a class="btn_page_review" page="prev" href="#ptop">&lt;</a>
                                            <a class="btn_page_review active" id="page_1" page="1" href="#ptop">1</a>
                                            <a class="btn_page_review" id="page_2" page="2" href="#ptop">2</a>
                                            <a class="btn_page_review" page="next" href="#ptop">&gt;</a>
                                            <a class="btn_page_review" page="last" href="#ptop">&gt;&gt;</a><?php break;?>
                                        <?php default: ?>
                                            <a class="btn_page_review" page="first" href="#ptop">&lt;&lt;</a>
                                            <a class="btn_page_review" page="prev" href="#ptop">&lt;</a>
                                            <a class="btn_page_review active" id="page_1" page="1" href="#ptop">1</a>
                                            <a class="btn_page_review" id="page_2" page="2" href="#ptop">2</a>
                                            <a class="btn_page_review" id="page_3" page="3" href="#ptop">3</a>
                                            <a class="btn_page_review" page="next" href="#ptop">&gt;</a>
                                            <a class="btn_page_review" page="last" href="#ptop">&gt;&gt;</a><?php endswitch;?>

                                </div><?php endif; endif; ?>
                    </div>
                </div>
            </div>
            <h4 id="faqTitle" class="small_screen_title">Customer FAQ</h4>
            <div class="wrapper_block borderTop clearfix">
                <div class="block">
                    <div class="faq">
                        <?php if(is_array($faq_data)): $i = 0; $__LIST__ = $faq_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$faq_val): $mod = ($i % 2 );++$i;?><dl class="faq_list">
                                <dt><span class="faq_list_dot"></span>Q<?php echo ($faq_val['kk']); ?>.&nbsp;&nbsp;<?php echo ($faq_val['question_title']); ?></dt>
                                <dd><?php echo ($faq_val['answer_content']); ?></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <h4 id="see_alsoTitle" class="small_screen_title">You may also like</h4>
            <div class="wrapper_block borderTop clearfix">
                <div class="block like">
                    <ul class="product_slider">
                        <?php if(is_array($like_product)): $i = 0; $__LIST__ = $like_product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro_val): $mod = ($i % 2 );++$i;?><li class="product_slider_item">
                                <a href="<?php echo product_url($pro_val['item_title'],$pro_val['item_id']);?>" title="<?php echo ($pro_val['item_title']); ?>">
                                    <div class="product_slider_item_pic">
                                        <img src="/image_create.php?big_img=<?php echo ($pro_val['image_sku']); ?>&item_id=<?php echo ($pro_val['item_id']); ?>&size=like_product" alt="<?php echo ($pro_val['item_title']); ?>">
                                    </div>
                                    <div class="product_slider_item_txt">
                                        <h4><?php echo ($pro_val['item_title']); ?></h4>
                                    </div>
                                </a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
            <div class="block">
                <div id="review_form" class="review_form">
                    <p class="titles">
                        Share your thoughts with other customers. Write a customer review here! <br>if you have any questions about our product and service, please email directly to <a href="mailto:service@womdee.com">service@womdee.com</a>
                    </p>
                    <form id="comment_form" class="form">
                        <p>Title:<span class="form_span red">*</span></p>
                        <p>
                        <input type="text" id="comment_title" <?php if(empty($userid)): ?>disabled<?php endif; ?> name="comment_title" class="txt" lang="notnull" notnull="1">
                        </p>
                        <span class="red ErrorText" id="comment_title_error"><?php echo L('NOTNULL_TITLE');?></span>
                        <p>Comment:<span class="form_span red">*</span></p>
                        <?php $url = $_SERVER['REQUEST_URI']; ?>
                        <?php if(empty($userid)): ?><div class="no_sign_textarea">
                                <span class="no_sign_notice">
                                    <em>
                                        <a href="/login.html?p=<?php echo ($url); ?>">Sign in</a> | <a href="/register.html">Create Your Account </a>
                                    </em>
                                </span>
                            </div>
                            <?php else: ?>
                            <p>
                                <textarea class="txtarea txt" name="content" lang="notnull" notnull="1"></textarea>
                            </p><?php endif; ?>
                        <span class="red ErrorText"><?php echo L('NOTNULL_CONTENT');?></span>
                        <br>
                        <div class="star">
                            <span class="btn_review_rate active" star="1"></span>
                            <span class="btn_review_rate active" star="2"></span>
                            <span class="btn_review_rate active" star="3"></span>
                            <span class="btn_review_rate active" star="4"></span>
                            <span class="btn_review_rate active" star="5"></span>
                            <input class="review_rate" type="hidden" name="review_rate" value="5">
                        </div>
                        Stars
                        <br>
                        <!--
                    <p>
                        Please enter the verification code - humans only!<span class="form_span red">*</span>
                    </p>
                    <p>
                    </p>

                    <div class="captcha-bar">
                        <div id="captcha-wrap">
                            <div class="captcha-box">
                                <img id="captcha" class="btn_captcha_refresh" alt="<?php echo L('BTN_REFRESH');?>" src="<?php echo U('product/getCaptcha/score/1111');?>">
                            </div>
                            <div class="text-box">
                                <label>Type the two words:</label>
                                <input class="ipt_captcha" <?php if(empty($userid)): ?>disabled<?php endif; ?> type="text" id="captcha-code" name="captcha-code" lang="notnull" notnull="1">
                            </div>
                            <div class="captcha-action">
                                <img id="captcha-refresh" alt="" src="/themes/anker/images/refresh.png">
                            </div>
                        </div>
                    </div>
                    &nbsp;&nbsp;<span class="form_span red ErrorText" id="captcha_comment_error"><?php echo L('NOTNULL_CAPTCHA');?></span>
                        -->
                        <p></p>
                        <p></p>
                        <p class="wait-review" style="padding-left: 32px; display: none;"><img src="/image/loading.gif"></p>
                        <p><label class="ErrorText err_info"></label></p>
                        <!--
                        <p><label class="success_info"></label></p>
                        -->
                        <p>
                            <span class="review_form_btn">
                                <input type="button" id="ia_button" value="Submit" class="btn sb_btn btn_review">
                            </span>
                            <input type="hidden" name="item_id" value="<?php echo ($item_id); ?>">
                        </p>
                    </form>
                    <div id="comment_tips"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var asin_data = '<?php echo ($asin_data); ?>';
        var asin_obj = JSON.parse(asin_data);
        var color_val,
            size_val;
    </script>
    <div class="footer_top clearfix">
    <div class="block">
        1-800-988-7973 (US) Mon-Fri 9am-5pm (PST) contact us: <a href="mailto:service@wondee.com">service@wondee.com</a> 
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