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
    <div class="h130 clear"></div>
    <div class="imgbox">
        <ul id="banner_img">
            <li><a href="/Product/productList/cateid/2658"><img id="banner_img" style="width:100%; height:100%;" src="/banner/b1.jpg"/></a></li>
            <li><a href="/Product/productList/cateid/2646"><img id="banner_img" style="width:100%; height:100%;" src="/banner/b2.jpg"/></a></li>
            <li><a href="/women-deep-v-neck-long-sleeve-maxi-bridesmaid-evening-dress-with-belt-p6.html"><img id="banner_img" style="width:100%; height:100%;" src="/banner/b3.jpg"/></a></li>
            <li><a href="/womens-fashion-sweater-knitted-scoop-neck-long-sleeve-casual-dress-p1.html"><img id="banner_img" style="width:100%; height:100%;" src="/banner/b4.jpg"/></a></li>
        </ul>
        <div class="clear"></div>
        <div class="imgnum">
            <span class="onselect">1</span>
                 <span>2</span>
                 <span>3</span>
                 <span>4</span>
            </div>
        </div>
        <div class="module-container">
	<div  class="items">
		<a class="item" href="/register.html" style="margin-right: 32px;">
			<div  class="image">
				<img  src="/banner/a1.jpg">
			</div>
			<div  class="p_text">
				<p  class="title">Join Womdee</p>
				<p  class="description">Join today and get a discount for your first womdee.com purchase!
</p>
				<p class ="p_more">
				<span  class="more">READ MORE</span>
				</p>
			</div>
		</a>
		<a class="item" href="/Product/productList/cateid/2658">
			<div  class="image img-right">
				<img src="/banner/a2.jpg">
			</div>
			<div  class="p_text">
				<p  class="title">New Release</p>
				<p  class="description">See what products we've been working on recently</p>
				<p class ="p_more">
				<span  class="more">READ MORE</span>
				</p>
			</div>
		</a>
		<div class="clear:both"></div>
	</div>

	<div  class="items">
		<a class="item" href="/Product/productList/cateid/2646" style="margin-right: 32px;">
			<div class="p_text img-right">
				<p class="title">Formal dress</p>
				<p class="description"> Power and Beauty,Mordern Fashion,Lady of Chic</p>
				<p class ="p_more">
				<span  class="more">READ MORE</span>
				</p>
			</div>
			<div class="image">
				<img src="/banner/a3.jpg">
			</div>
		</a>
		<a class="item" href="/Product/productList/cateid/2660">
			<div class="p_text">
				<p class="title">Cocktail dress</p>
				<p class="description">New Trends, Simplicity but not Simple</p>
				<p class ="p_more">
				<span  class="more">READ MORE</span>
				</p>
			</div>
			<div class="image"><img src="/banner/a4.jpg"></div>
		</a>
	</div>
</div>
        <div class="clear"></div>
        <div class="index_about clearfix">
            <div class="big_block">
                <div class="index_about_follow">
                    <p><?php echo L('LABEL_FOLLOW_US');?></p>
                    <p style="padding-left: 100px;">
                    <a rel="nofollow" target="_blank" href="http://www.facebook.com/Womdee.fans" class="fb"></a>
                        
                    <a rel="nofollow" target="_blank" href="http://www.youtube.com/user/Womdee" class="yb"></a>
                     
                        </a>
                    </p>
                </div>
                <a class="index_about_txt" href="/" rel="nofollow">
                    Womdee-All for women's beauty! We aren’t inventors – there are so few of those in the world of fashion today – nor are we imitators, that is far too easy. In order to closely maintain the steps with the ever-changing fashion trends, we find inspiration and trends from all over the world and attempt to apply these elements to our latest design.

                </a>
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