<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="Keywords" content="WOMDEE">
        <meta name="Description" content="We created tackling first-world problems like low battery and slow data access to make life better">
        <title>womdee</title>
        <link rel="stylesheet" type="text/css" href="/css/contact.css" />
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
            <div class="position"><?php echo L('LABEL_YOUR_POSITION');?> <a href="/"><?php echo L('LABEL_HOME');?></a> <code>&gt;</code> <a href="/size-and-fit-guides.html">Size and Fit Guides</a>
            </div>
            <div class="cut_line">
                <span class="left_line"></span><span class="right_line"></span>
            </div>
            <h1 class="title">Size and Fit Guides</h1>
            <div class="wrapper business_wrap">
                <div class="content_text clearfix concant-us-text">
                    All size conversions are approximate. Fits may turn out to have minor difference by style or personal preference; and sizes may vary by manufacturers.
                    <br>
                    <br>
                    <h2>Apparel</h2>
                    <p>
                        <img src="/image/size.png">
                    </p>
                    <h2>Dress Measuring Guide</h2>
                    <br>
The operation instruction below is just a guide. We highly recommend that you ask someone else for help to finish the measurements for you in case you can get inaccurate numbers and may lead to disappointment. And put on undergarments you will wear with your dress; do not wear other clothes when measuring.
                    <br>
                    <br>
                    <h2>For Standard Dresses</h2>
                    <br>
                    <p style="text-align: center;">
                        <img src="/image/size/bust.png">
                        <h3 style="text-align: center;">Bust</h3>
                    </p>
                    <br>
                    It is not your bra size! Take the tape around your back and bring it across the fullest part of your bust. Your arms should be relaxed, down at your sides. You need to wear a bra when measuring.
                    <br>
                    <br>
                    <br>
                    <p style="text-align: center;">
                        <img src="/image/size/waist.png">
                        <h3 style="text-align: center;">Waist</h3>
                    </p>
                    <br>
                    This is the smallest part of your waist. It refers to the narrowest point between the bottom of the rib cage and the pelvis. Also known as the natural waistline.
                    <br>
                    <br>
                    <br>
                    <p style="text-align: center;">
                        <img src="/image/size/hips.png">
                        <h3 style="text-align: center;">Hips</h3>
                    </p>
                    <br>
                    This is the widest part of your hips, across the hipbone. Measurement is taken approximately 7 inches below the natural waistline. This measurement is not needed for full gowns.
                    <br>
                    <br>
                    <br>
                    <p style="text-align: center;">
                        <img src="/image/size/floor.png">
                        <h3 style="text-align: center;">Hollow to Floor</h3>
                    </p>
                    <br>
                    This is the length from your hollow ( the hollow just under your neck ) to your heels. (Take the tape from your front, with bare foot ). You should stand upright and put your feet together.
                    <br>
                    <br>
                    <br>
                    <p style="text-align: center;">
                        <img src="/image/size/height.png">
                        <h3 style="text-align: center;">Height</h3>
                    </p>
                    <br>
                    You need to stand straight and put your feet together without shoes. And begin to pull tape straightly  from the top of your head to the floor.
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
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