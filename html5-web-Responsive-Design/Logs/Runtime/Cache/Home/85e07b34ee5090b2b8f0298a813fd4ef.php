<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="Keywords" content="Womdee">
        <meta name="Description" content="We created tackling first-world problems like low battery and slow data access to make life better">
        <title>womdee</title>
        <link rel="stylesheet" type="text/css" href="/css/member.css" />
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
    <div class="wrapper_block">
        <div class="sign_bar wraps">
            <div class="padding_bar">
                <div class="other_login">
                    <p class="why_sign_up"><?php echo L('REGISTER_TITLE_INFO');?></p>
                    <p class="login_title"><?php echo L('LOGIN_TITLE_OTHER');?></p>
                    <p>
                        <span class="lg_span">
                            <a class="lg_btn" href="<?php echo ($google_login_url); ?>"><span class="lg_ico gg_ico"></span><span class="lg_btn_txt"><?php echo L('LOGIN_WITH_GOOGLE');?></span></a>
                            <br>
                            <em><?php echo L('LOGIN_WITH_GOOGLE');?></em>
                        </span>
                        <span class="lg_span">
                            <a class="lg_btn" href="<?php echo ($fb_login_url); ?>"><span class="lg_ico fb_ico"></span><span class="lg_btn_txt"><?php echo L('LOGIN_WITH_FACEBOOK');?></span></a>
                            <br>
                            <em><?php echo L('LOGIN_WITH_FCAEBOOK_INFO');?></em>
                        </span>
                    </p>
                </div>
                <form method="post" id="reg_form" action="<?php echo U('index.php/UserRegister/doRegister');?>" class="form sign_form">
                    <p class="login_title"><?php echo L('SIGN_IN_INFORMATION');?></p>
                    <p>
                        <label><?php echo L('TEXT_YOUR_EMAIL');?></label>
                        <br>
                        <input type="text" id="email" name="email" class="txt" lang="email" notnull="1">
                        <label class="ErrorText"><?php echo L('ERROR_EMAIL');?></label>
                        <label class="Err error_user_msg"><?php echo L('EMAIL_EXISTS');?></label>
                    </p>
                    <p>
                        <label>Username:<br><em class="form_info"><?php echo L('FORMAT_USERNAME');?></em></label><br>
                        <input type="text" id="username" name="username" class="txt" lang="username" notnull="1">
                        <label class="ErrorText"><?php echo L('ERROR_USERNAME');?></label>
                    </p>
                    <p>
                        <label><?php echo L('TEXT_CREATE_PASSOWRD');?><br><em class="form_info"><?php echo L('FORMAT_PASSWORD');?></em></label>
                        <br>
                        <input type="password" autocomplete="off" id="password" name="password" lang="password" class="txt" notnull="1">
                        <label class="ErrorText"><?php echo L('ERROR_PASSWORD');?></label>
                    </p>
                    <p>
                        <label><?php echo L('CONFIRM_PASSWORD');?></label><br>
                        <input type="password" autocomplete="off" id="re_password" name="re_password" class="txt" lang="re_password">
                        <label class="ErrorText"><?php echo L('ERROR_CONFIRM_PASSWORD');?></label>
                    </p>
                    <!--<div class="line_dashed"></div>-->
                    <!--
                    <p><span><?php echo L('TEXT_GENDER');?></span>
                        <span class="form_a"><span><?php echo L('TEXT_MALE');?></span> <input type="radio" value="0" checked="" name="sex"></span> &nbsp; <span><span><?php echo L('TEXT_FEMALE');?></span> <input type="radio" value="1" name="sex"></span>
                    </p>
                    <p>
                        <span class="halfwidth_form">
                            <span><?php echo L('TEXT_BIRTH');?></span>
                            <p>
                                <select id="birthday_month" name="birthday_month" class="form-select">
                                    <option value=""><?php echo L('TEXT_MONTH');?></option>
                                    <option value="1"><?php echo L('TEXT_JANUARY');?></option>
                                    <option value="2"><?php echo L('TEXT_FEBRUARY');?></option>
                                    <option value="3"><?php echo L('TEXT_MARCH');?></option>
                                    <option value="4"><?php echo L('TEXT_APRIL');?></option>
                                    <option value="5"><?php echo L('TEXT_MAY');?></option>
                                    <option value="6"><?php echo L('TEXT_JUNE');?></option>
                                    <option value="7"><?php echo L('TEXT_JULY');?></option>
                                    <option value="8"><?php echo L('TEXT_AUGUST');?></option>
                                    <option value="9"><?php echo L('TEXT_SEPTEMBER');?></option>
                                    <option value="10"><?php echo L('TEXT_OCTOBER');?></option>
                                    <option value="11"><?php echo L('TEXT_NOVEMBER');?></option>
                                    <option value="12"><?php echo L('TEXT_DECEMBER');?></option>
                                </select>
                                <p class="focus_input"><input type="text" maxlength="2" name="birthday_day" class="stxt" placeholder="<?php echo L('TEXT_DAT');?>"></p>
                                <p class="focus_input"><input type="text" maxlength="4" name="birthday_year" class="stxt" placeholder="<?php echo L('TEXT_YEAR');?>"></p>
                            </p> 
                        </span>
                    </p>
												
                    <p><label><?php echo L('TEXT_LOCATION');?></label><br>
                        <select name="country" class="txt">
                            <?php if(is_array($country_data)): foreach($country_data as $key=>$country_name): ?><option value="<?php echo ($key); ?>" label="<?php echo ($country_name); ?>"><?php echo ($country_name); ?></option><?php endforeach; endif; ?>
                        </select>
                    </p>

                    <div class="line_dashed"></div>
                    -->
                    <p>
                        <!--
                        <?php echo L('TEXT_CAPTCHA_INFO');?><br>
                        <input type="text" class="inputBg" id="captcha" name="captcha" size="8" notnull="1">
                        <img title="Click to refresh image." style="cursor: pointer;vertical-align: middle" class="btn_captcha_refresh" alt="<?php echo L('BTN_REFRESH');?>" src="<?php echo U('UserRegister/getCaptcha/score/1111');?>" id="captcha-img">
                        -->
                    </p>

                    <!--
                    <p><input type="checkbox" id="agree" name="agreement"> I agree to the Womdee <a title="Terms of Service" href="/" target="_blank" class="fddd">Terms of Service</a> and <a target="_blank" title="Privacy Policy" href="/">Privacy Policy</a></p>
                    -->
                    <p><span class="red" id="error_msg"></span></p>
                    <p>
                        <input type="button" id="submit_btn" class="btn sb_btn btn_register" value="<?php echo L('BTN_CREATE');?>">
                        <!--
                        <span id="form_loading" style="display:none;"><img src="/image/loading.gif"></span>
                        -->
                    </p>
                    <div class="login_up"><?php echo L('TEXT_HAS_ACCOUNT');?><a href="/login.html" class="form_a"><?php echo L('TEXT_LOGIN_NOW');?></a></div>
                </form>
            </div>
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
                    <?php if(is_array($foot_bestseller)): foreach($foot_bestseller as $key=>$rs): ?><dd><a href="<?php echo product_url($rs['item_title'],$rs['item_id']);?>" title="<?php echo ($rs['item_title']); ?>">
                        <?php echo (substr($rs['item_title'],0,20)); ?></a></dd><?php endforeach; endif; ?>
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