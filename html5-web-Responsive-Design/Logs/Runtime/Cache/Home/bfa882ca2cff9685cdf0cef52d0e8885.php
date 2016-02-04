<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="Keywords" content="WOMDEE">
        <meta name="Description" content="We created tackling first-world problems like low battery and slow data access to make life better">
        <title>womdee product</title>
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
            
            <div class="search-box" style="margin-top: 6px; box-sizing: border-box; display: none;">
                <form action="/Product/productSearch" method="get">

                    <input type="text" name="search_key">
                    <button type="submit" style="cursor: pointer; background-color: #a15d03; color: #fff"><?php echo L('BTN_SEARCH');?></button>

                </form>
            </div>
           
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
                                    <div class="nav-sub2-cover">
                                        <div class="nav-power">
                                            <a href="<?php echo ($child_menu['url']); ?>">
                                                <!--                                                <img src="/img/navPowerIQ.png">-->
                                            </a>
                                        </div>
                                    </div>
                                    <ul class="nav-sub2">
                                        <?php if(is_array($child_menu['child_category'])): $i = 0; $__LIST__ = $child_menu['child_category'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child_child_menu): $mod = ($i % 2 );++$i;?><li>
                                                <a href="<?php echo ($child_child_menu['url']); ?>">
                                                    <!--                                                    <img src="/img/nav/external_batteries.jpg">-->
                                                    <p>
                                                        <?php echo ($child_child_menu['category_title']); ?>
                                                    </p>
                                                </a>
                                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
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
                <div class="pic_base">
                    <?php if(is_array($product_img)): $i = 0; $__LIST__ = $product_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img_val): $mod = ($i % 2 );++$i;?><img style="cursor: move;"  sid="<?php echo ($key); ?>" style="margin: 0 auto;" class="show-big <?php if($key == 0): ?>active<?php endif; ?>" src="/image_create.php?big_img=<?php echo ($img_val); ?>&item_id=<?php echo ($item_id); ?>&size=product_detail" id="pic_<?php echo ($key); ?>" itemprop="photo">
                        <div class="lg-img" id="lg-img-<?php echo ($key); ?>">
                            <img src="/image_create.php?big_img=<?php echo ($img_val); ?>&item_id=<?php echo ($item_id); ?>&size=product_detail">
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="pic_small" style="padding-left: 20px; padding-right: 20px; width: 270px; height: 52px;">
                    <label class="img-prev" style="position: absolute; left: 0; top: 10px; height: 72px; background-color: #ccc; z-index: 12; cursor: pointer; padding-top: 30px; color: #a15d03; box-sizing: border-box;"><<</label>
                    <div class="img-wrap" style="position: absolute; left: 20px; box-sizing: border-box; ">
                    <?php if(is_array($product_img)): $i = 0; $__LIST__ = $product_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img_val): $mod = ($i % 2 );++$i;?><span style="margin-bottom: 10px;" <?php if($key == 0): ?>class="hover"<?php endif; ?> sid="pic_<?php echo ($key); ?>"><b></b><img src="/image_create.php?big_img=<?php echo ($img_val); ?>&item_id=<?php echo ($item_id); ?>&size=detail_min"></span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <input class="img-num" type="hidden" value="<?php echo count($product_img); ?>">
                    <label class="img-next" style="position: absolute; right: 0; top: 10px; height: 72px; background-color: #ccc; z-index: 12; cursor: pointer; padding-top: 30px; color: #a15d03; box-sizing: border-box;">>></label>
                </div>
            </div>
            <div class="product_item_wrapper">
                <h3 itemprop="itemreviewed" class="s_title"><?php echo ($product_baseinfo['item_title']); ?></h3>
                <ul class="product_item_wrapper_info">
                    <li itemscope="" itemprop="rating" class="product_items_li quick_li">
                        Asin: <?php echo ($product_list['item_code']); ?>
                    </li>
                    <li itemscope="" itemprop="rating" class="product_items_li quick_li">
                        <div id="fixed" class="star"><div></div></div>
                        <span class="q_reviews">
                            Score : <em itemprop="average">4.7</em>&nbsp;&nbsp;&nbsp;(<a title="See all reviews" href="javascript:void(0);" class="quick_reviews"><em itemprop="count">536</em> Customer Reviews</a>)
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
                                    <?php if(strtoupper($attr_key) == 'COLOR'): ?><em class="black_bg choose_color btn_choose_color" style="background:<?php echo ($attr_row); ?>" title="<?php echo ($attr_row); ?>" ></em>
                                        <?php else: ?>
                                        <em class="black_bg choose_color btn_choose_color"><?php echo ($attr_row); ?></em><?php endif; ?>
                                    </dd><?php endforeach; endif; ?>
                            </dl>
                        </li><?php endforeach; endif; ?>
                    <!--                    <li class="product_items_li">
                                            <dl class="cyc" id="market_list">
                                                <dt>Choose your country:</dt>
                                                <?php if(is_array($site_data)): $i = 0; $__LIST__ = $site_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$site_row): $mod = ($i % 2 );++$i;?><dd><a href="javascript:void(0);" onClick="set_active(this,true)" class="ec" id="amazon" url="" ><?php echo ($site_row['listing_site_name']); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </dl>
                                        </li>-->
                    <li class="product_items_li">
                    <?php if(!empty($site_data)): ?><a onClick="turn_url(this)" href="<?php echo ($site_data['listing_site_url']); ?>/dp/<?php echo ($product_list['item_code']); ?>" target="_blank" rel="nofollow" id="buynow" class="buyamazon piwi_btn"><?php echo L('BUY_AMAZON');?></a>
                        <?php else: ?>
                        <span class="buyamazon_no piwi_btn"><?php echo L('BUY_AMAZON');?></span><?php endif; ?>
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
            <li id="dpTitle2" class="product_slider_nav_li product_info_btn hover">
                <span>Product Description</span>
            </li>
            <li id="reviewsTitle2" class="product_slider_nav_li customer_reviews_btn">
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
            <div class="wrapper_block prdouct_descirption_wrapper clearfix show_block">
                <div class="pd_item_box content_text clearfix">
                    <div class="pd_item_txt_content"><?php echo ($product_baseinfo['item_description']); ?></div>
                </div>
            </div>
            <h4 class="small_screen_title" id="review_screen_title">Customer Reviews</h4>
            <div class="wrapper_block borderTop reviews_wrapper clearfix">
                <div class="reviews block">
                    <div class="reviews_info_box clearfix">
                        <div id="reviews_box">
                            <table cellspacing="0" cellpadding="0" class="table">
                                <tbody class="item_box_list">
                                <?php if(is_array($reviews)): foreach($reviews as $key=>$rs): ?><tr>
                                        <th width="2%" class="reviewer">
                                    <div class="reviewer_box">
                                        <p class="reviewer_pic default_reviewer_pic"></p>
                                        <div class="reviewer_info">
                                            <div class="reviewer_name"><?php echo ($user_data[$rs['review_create_userid']]); ?></div>
                                            <div class="reviews_star"><div id="fixed_311215"></div></div>
                                        </div>
                                    </div>
                                    </th>
                                    <td width="98%" class="reviews_details">
                                        <ul>
                                            <li class="reviews_details_title">
                                                <?php echo ($rs['review_title']); ?>
                                            </li>
                                            <li class="review_rate">
                                                <div class="star">
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
                                                </div>
                                            </li>
                                            <li class="reviews_info">
                                                <?php echo ($rs['review_content']); ?>
                                            </li>
                                            <li class="reviews_date"><?php echo ($rs['review_create_time']); ?></li>
                                        </ul>
                                    </td>
                                    </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if($device != 'pc'): ?><p class="tc">
                                <span class="loading">
                                    <img src="/image/loading.gif">
                                </span>
                                <a class="btn_more_product_review" data-target=".item_box_list" page="1" href="javascript:void(0);"><?php echo L('LOAD_MORE');?></a>
                                <input type="hidden" class="item_id" value="<?php echo ($item_id); ?>">
                                <input type="hidden" class="tpl_file" value="product_review_box_item">
                            </p>
                            <?php else: ?>
                            <div class="pagelist" id="comment_pages">
                                <input type="hidden" class="item_id" value="<?php echo ($item_id); ?>">
                                <input type="hidden" class="review_sum_pages" value="<?php echo ($review_sum_pages); ?>">
                                <input type="hidden" class="tpl_file" value="product_review_box_item">
                                <a class="btn_page_review" page="first" href="javascript:void(0);">&lt;&lt;</a>
                                <a class="btn_page_review" page="prev" href="javascript:void(0);">&lt;</a>
                                <a class="btn_page_review active" id="page_1" page="1" href="javascript:void(0);">1</a>
                                <a class="btn_page_review" id="page_2" page="2" href="javascript:void(0);">2</a>
                                <a class="btn_page_review" id="page_3" page="3" href="javascript:void(0);">3</a>
                                <a class="btn_page_review" page="next" href="javascript:void(0);">&gt;</a>
                                <a class="btn_page_review" page="last" href="javascript:void(0);">&gt;&gt;</a>
                            </div><?php endif; ?>
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
                        Feel free to ask questions about this product here. <br>Your question will be posted on this page.<br> Anker Customer Support and the Anker user community will do their best to quickly answer your question.
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
                        <p id="form_loading" class="form_loading"><img src="/image/loading.gif"></p>
                        <p><label class="ErrorText err_info"></label></p>
                        <p><label class="success_info"></label></p>
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
    <div class="footer_top clearfix">
    <div class="block">
        <?php echo L('FOOT_TIP_INFO');?>
    </div>
</div>
<div class="footer clearfix">
    <div class="wrap">
        <div class="block clearfix">
            <div class="footer_link clearfix">
                <dl>
                    <dt><?php echo L('LABEL_BEST_SELLERS');?></dt>
                    <dd><a href="/">Astro Mini (Black)</a></dd>
                    <dd><a href="/">40W Wall Charger</a></dd>
                    <dd><a href="/">Lightning Cable</a></dd>
                    <dd><a href="/">24W Car Charger</a></dd>
                </dl>
                <dl>
                    <dt><?php echo L('LABEL_ABOUT_TITLE');?></dt>
                    <dd><a href="/about-us.html"><?php echo L('LABEL_ABOUT_TITLE');?></a></dd>
                    <dd><a href="/"><?php echo L('LABEL_PRESS_CENTER');?></a></dd>
                    <dd><a href="/contact-us.html"><?php echo L('LABEL_CONTACT_US');?></a></dd>
                    <dd><a href="/business.html"><?php echo L('LABEL_WHOLESALE');?></a></dd>
                </dl>
                <dl>
                    <dt><?php echo L('LABEL_SUPPORT');?></dt>
                    <dd><a href="/"><?php echo L('LABEL_DRIVERS');?></a></dd>
                    <dd><a href="/"><?php echo L('LABEL_SERVICE');?></a></dd>
                    <dd><a href="/"><?php echo L('LABEL_POLICY');?></a></dd>
                    <dd><a href="/"><?php echo L('LABEL_TERMS_SERVICE');?></a></dd>
                    <dd><a href="/"><?php echo L('LABEL_FAQ');?></a></dd>
                </dl>
            </div>
            <div class="footer_info">
                <div class="show_language">
                    <p><?php echo L('LABEL_SELECT_LANG');?></p>
                    <div class="language btn_language">
                        <?php echo ($lang_data['listing_site_country']); ?>
                        <ul class="language_list">
                            <?php if(is_array($site_datas)): $i = 0; $__LIST__ = $site_datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$site_vall): $mod = ($i % 2 );++$i;?><li><a href="javascript:void(0);" onclick="ChangeLanguage('<?php echo ($site_vall["listing_site_language"]); ?>','<?php echo ($site_vall["listing_site_name"]); ?>');"><?php echo ($site_vall['listing_site_country']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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