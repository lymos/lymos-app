<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="Keywords" content="womdee">
        <meta name="Description" content="We created tackling first-world problems like low battery and slow data access to make life better">
        <title>womdee</title>
        <link rel="stylesheet" type="text/css" href="/css/member.css" />
    </head>
    <body>
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
            <span class="p-png-search p-btn-show-search"><img style="vertical-align:bottom; cursor: pointer;" src="/image/search.png"></span>
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
    <div class="wrapper_block">
        <div class="sign_bar wraps">
            <div class="padding_bar">
                <div class="other_login">
                    <p class="login_title"><?php echo L('LOGIN_TITLE_OTHER');?></p>
                    <p>
                        <span class="lg_span">
                            <a class="lg_btn" href="<?php echo ($google_login_url); ?>">
                                <span class="lg_ico gg_ico"></span>
                                <span class="lg_btn_txt"><?php echo L('LOGIN_WITH_GOOGLE');?></span>
                            </a>
                            <br>
                            <em><?php echo L('LOGIN_WITH_GOOGLE_INFO');?></em>
                        </span>
                        <span class="lg_span">
                            <a class="lg_btn" href="<?php echo ($fb_login_url); ?>">
                                <span class="lg_ico fb_ico"></span>
                                <span class="lg_btn_txt"><?php echo L('LOGIN_WITH_FACEBOOK');?></span>
                            </a>
                            <br>
                            <em><?php echo L('LOGIN_WITH_FCAEBOOK_INFO');?></em>
                        </span>
                    </p>
                </div>
                <form method="post" action="<?php echo U('index.php/UserRegister/checkLogin/');?>" class="form sign_form">
                    <p class="login_title"><?php echo L('LOGIN_TITLE');?></p>
                    <p>
                        <label><?php echo L('TEXT_EMAIL');?></label><br>
                        <input type="text" name="username" class="txt" lang="notnull" notnull="1">
                        <label class="ErrorText"><?php echo L('NOTNULL_USERNAME');?></label>
                    </p>
                    <p>
                        <label><?php echo L('TEXT_PASSWORD');?></label><br>
                        <input type="password" autocomplete="off" name="password" class="txt" lang="notnull" notnull="1">
                        <label class="ErrorText"><?php echo L('NOTNULL_PASSWORD');?></label>
                    </p>
                    <p>
                        <!--
                        <input type="checkbox" checked="" name="remember"><?php echo L('STAY_LOGIN');?> --><a href="/reset_password.html" class="form_a"><?php echo L('FORGET_PASSWORD');?></a>
                    </p>
                    <p></p>
                    <p></p>
                    <p>
                        <input type="hidden" name="refer" value="<?php echo ($_GET['p']); ?>">
                        <input type="button" class="btn sb_btn btn_login" value="<?php echo L('BTN_LOGIN');?>">
                    </p>
                    <div class="login_up"><?php echo L('NOT_HAS_ACCOUNT');?>
                        <a href="/register.html" class="form_a"><?php echo L('CREATE_ACCOUNT');?></a>
                    </div>
                </form>
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
<script type="text/javascript" src="/js/carousel.js"></script>

</body>
</html>