<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="Keywords" content="Womdee">
        <meta name="Description" content="We created tackling first-world problems like low battery and slow data access to make life better">
        <title>womdee</title>
        <link rel="stylesheet" type="text/css" href="/css/index.css" />
        <link rel="stylesheet" type="text/css" href="/css/member.css" />
        <link rel="stylesheet" type="text/css" href="/css/index_info.css" />
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
    <div class="h130 clear"></div>
    <div class="imgbox">
        <ul id="banner_img">
            <li><img id="banner_img" style="width:100%; height:100%;" src="/banner/banner001.jpg"/></li>
            <li><img id="banner_img" style="width:100%; height:100%;" src="/banner/banner001.jpg"/></li>
            <li><img id="banner_img" style="width:100%; height:100%;" src="/banner/banner001.jpg"/></li>
            <li><img id="banner_img" style="width:100%; height:100%;" src="/banner/banner001.jpg"/></li>
            <li><img id="banner_img" style="width:100%; height:100%;" src="/banner/banner001.jpg"/></li>
        </ul>
        <div class="clear"></div>
        <div class="imgnum">
            <span class="onselect">1</span>
                 <span>2</span>
                 <span>3</span>
                 <span>4</span>
                 <span>5</span>
            </div>
        </div>
        <div class="module-container">
	<div  class="items">
		<a  target="_blank" class="item" href="/" style="margin-right: 12px;">
			<div  class="image">
				<img  src="/banner/11.jpg">
			</div>
			<div  class="p_text">
				<p  class="title">Join Womdee</p>
				<p  class="description">Join today and get a 24-month.</p>
				<p class ="p_more">
				<span  class="more">READ MORE</span>
				</p>
			</div>
		</a>
		<a target="_blank" class="item" href="/">
			<div  class="image img-right">
				<img src="/banner/22.jpg">
			</div>
			<div  class="p_text">
				<p  class="title">New Release</p>
				<p  class="description">See what products we’ve </p>
				<p class ="p_more">
				<span  class="more">READ MORE</span>
				</p>
			</div>
		</a>
		<div class="clear:both"></div>
	</div>

	<div  class="items">
		<a target="_blank" class="item" href="/" style="margin-right: 12px;">
			<div class="p_text img-right">
				<p class="title">Lumos LED Desk Lamp</p>
				<p class="description">Enjoy comfortable, non-flickering light for </p>
				<p class ="p_more">
				<span  class="more">READ MORE</span>
				</p>
			</div>
			<div class="image">
				<img src="/banner/33.jpg">
			</div>
		</a>
		<a target="_blank" class="item" href="/">
			<div class="p_text">
				<p class="title">SoundCore</p>
				<p class="description">Dual-Driver Portable Bluetooth S Playtime</p>
				<p class ="p_more">
				<span  class="more">READ MORE</span>
				</p>
			</div>
			<div class="image"><img src="/banner/44.jpg"></div>
		</a>
	</div>
</div>
        <div class="clear"></div>
        <div class="index_about clearfix">
            <div class="big_block">
                <div class="index_about_follow">
                    <p><?php echo L('LABEL_FOLLOW_US');?></p>
                    <p><a rel="nofollow" target="_blank" href="http://www.facebook.com/Womdee.fans" class="fb"></a>
                        <a rel="nofollow" target="_blank" href="https://twitter.com/Womdee" class="tw"></a>
                        <a rel="nofollow" target="_blank" href="http://www.youtube.com/user/Womdee" class="yb"></a>
                        <a rel="nofollow" class="instagram" href="http://instagram.com/Womdee?ref=badge"></a>
                        <a rel="nofollow" class="gplus" href="https://plus.google.com/Womdee"><i class="icon-googleplus"></i></a>
                    </p>
                </div>
                <a class="index_about_txt" href="/" rel="nofollow">
                    <?php echo L('LABEL_INDEX_ABOUT');?>
                </a>
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