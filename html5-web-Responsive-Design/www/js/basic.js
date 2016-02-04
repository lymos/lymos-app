/* basic.js */
'use strict';
var basic = function(){
	this.check_form = true;
}

basic.prototype.submit = function(obj){
	var $form = $(obj).parents('form');
	var status = this.checkInput($form);
	if(status){
		$form.submit();
	}
}
basic.prototype.checkBlurText = function(evt){
	var $obj = $(evt.target);
	var lang = $obj.attr('lang');
	if(lang){
		var ipt_val = $obj.val();
		var err_obj = $obj.next('.ErrorText');
		if(err_obj.length == 0){
			err_obj = $obj.parent().next('.ErrorText');
		}
		if(err_obj.length == 0){
			err_obj = $obj.parents('.captcha-bar').next('.ErrorText');
		}

		switch(lang){
			case 'email':
				var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
				if(! reg.test(ipt_val)){
					err_obj.addClass('active');
					B.check_form = false;
				}else{
					if(err_obj.hasClass('active')){
						err_obj.removeClass('active');
					}
					B.check_form = true;
					B.checkUserExists(ipt_val, $obj);
				}
				break;
			case 'password':
				var reg=/^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i;
				if(! reg.test(ipt_val) || ipt_val.length < 6){
					err_obj.addClass('active');
					B.check_form = false;
				}else{
					if(err_obj.hasClass('active')){
						err_obj.removeClass('active');
					}
					B.check_form = true;
				}
				break;
			case 're_password':
				var password = $obj.parents('form').find('input[name=password]').val();
				if(password != ipt_val){
					err_obj.addClass('active');
					B.check_form = false;
				}else{
					if(err_obj.hasClass('active')){
						err_obj.removeClass('active');
					}
					B.check_form = true;
				}
				break;
			case 'username':
				var reg = /[%|,|\\|\*|\"|<|>|\'|\&]+/;
				if(reg.test(ipt_val)){
					err_obj.addClass('active');
					B.check_form = false;
				}else{
					if(err_obj.hasClass('active')){
						err_obj.removeClass('active');
					}
					B.check_form = true;
				}
				break;
			case 'notnull':
				if(! ipt_val.trim()){
					err_obj.addClass('active');
					B.check_form = false;
				}else{
					if(err_obj.hasClass('active')){
						err_obj.removeClass('active');
					}
					B.check_form = true;
				}
			default:
				break;
		}
	}
}
basic.prototype.checkUserExists = function(email, obj){
	if(! email){
		return false;
	}
	ajaxObj.post('checkUser', {email: email}, 'checkUserCallback', obj);

}
basic.prototype.checkInput = function(form){
	var ipt_obj = form.find('.txt[notnull=1]');
	var check = true;
	ipt_obj.each(function(){
		var $this = $(this);
		var err_obj = $this.next('.ErrorText');
		if(err_obj.length == 0){
			err_obj = $this.parent().next('.ErrorText');
		}
		if(! $this.val().trim()){
			err_obj.addClass('active');
			B.check_form = false;
			check = false;
			return ;
		}
	});
	this.check_form = check;
	return this.check_form;
}
basic.prototype.returnDeviceType = function(){
	var useragent = navigator.userAgent;
    var agent_ar = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");    
    var flag = 'PC';    
    var count = agent_ar.length;
    for (var i = 0; i < count; i++) {    
         if (useragent.indexOf(agent_ar[i]) > 0) { 
         	flag = 'MOBILE'; 
         	break; 
         }    
    }    
    return flag;
}


var ajaxObj = {
	post: function(url, data, callback, target){
		var obj = this;
		$.ajax({
			type: 'post',
			url: url,
			data: data,
			success: function(res){
				if(typeof(obj[callback]) == 'function'){
					obj[callback](res, target);
				}
			}
		})
	},
	get: function(url, data, callback, target){
		var obj = this;
		$.getJSON(url, data, function(res){
			if(typeof(obj[callback]) == 'function'){
				obj[callback](res, target);
			}
		});
	},
	checkUserCallback: function(res, target){
		var err_user = target.nextAll('.error_user_msg');
		if(target.attr('actype') == 'reset_password'){
			if(! res.status){
				err_user.addClass('active');
				$(".btn_reset_password").attr('disabled', true);
			}else{
				$(".btn_reset_password").attr('disabled', false);
				if(err_user.hasClass('active')){
					err_user.removeClass('active');
				}
			}
		}else{
			if(res.status){
				err_user.addClass('active');
				B.check_form = false;
			}else{
				if(err_user.hasClass('active')){
					err_user.removeClass('active');
				}	
			}
		}
	},
	// 下一页
	getNextPage: function(url, data, target, type){
		var callback;
		switch(type){
			case 'MOBILE':
				callback = 'mobileGotoPageCallback';
				break;
			default:
				callback = 'pcGotoPageCallback';
				break;

		}
		return this.get(url, data, callback, target);
	},
	getNextPageReview: function(url, data, target, type){
		var callback;
		switch(type){
			case 'MOBILE':
				callback = 'mobileReviewGotoPageCallback';
				break;
			default:
				callback = 'pcReviewGotoPageCallback';
				break;

		}
		return this.get(url, data, callback, target);
	},

	pcReviewGotoPageCallback: function(res, target){
		if(res.status){
			if(target.parents('.reviews_info_box').length == 0){
				var html = '<h4 class="titles">Latest Post</h4>';
			}else{
				var html = '';
			}
			html += res.data.html;
			var $parent = target.parents('#page_to_comment').find('#customer_comment');
			if($parent.length == 0){
				$parent = target.parents('.reviews_info_box').find('table');
			}
			$parent.html(html);
			target.parent().find('.btn_page_review').removeClass('active');
			var page_val = target.attr('page');
			var data = res.data;
			switch(page_val){
				case 'first':
				case 'last':
				case 'next':
				case 'prev':
					var page_3 = data.page_3,
						page_2 = data.page_2,
						page_1 = data.page_1;
					var $parent = target.parent();
					$parent.find('#page_3').html(page_3).attr('page', page_3);
					$parent.find('#page_2').html(page_2).attr('page', page_2);
					$parent.find('#page_1').html(page_1).attr('page', page_1);
					$parent.find('.btn_page_review[page=' + data.current_page + ']').addClass('active');
					break;
				default:
					target.addClass('active');
					break;
			}
		}
	},

	pcGotoPageCallback: function(res, target){
		if(res.status){
			target.parent().parent().find('ul.product_slider').html(res.data.html);
			target.parent().find('.btn_page').removeClass('active');
			var page_val = target.attr('page');
			var data = res.data;
			switch(page_val){
				case 'first':
				case 'last':
				case 'next':
				case 'prev':
					var page_3 = data.page_3,
						page_2 = data.page_2,
						page_1 = data.page_1;
					var $parent = target.parent();
					$parent.find('#page_3').html(page_3).attr('page', page_3);
					$parent.find('#page_2').html(page_2).attr('page', page_2);
					$parent.find('#page_1').html(page_1).attr('page', page_1);
					$parent.find('.btn_page[page=' + data.current_page + ']').addClass('active');
					break;
				default:
					target.addClass('active');
					break;
			}
		}
	},
	mobileReviewGotoPageCallback: function(res, target){
		target.parent().find('.loading').hide();
		if(res.status){
			var _target = target.attr('data-target');
			if(_target){
				$(_target).append(res.data.html);
			}else{
				target.before(res.data.html);
			}
			target.attr('page', res.data.current_page);			
			target.show();
		}else{
			target.replaceWith('<span>' + res.data + "</span>");
		}
	},
	mobileGotoPageCallback: function(res, target){
		target.parent().find('.loading').hide();
		if(res.status){
			target.parent().parent().find('ul.product_slider').append(res.data.html);
			target.attr('page', res.data.current_page);
			target.show();
		}else{
			target.replaceWith('<span>' + res.data + "</span>");
		}		
	},
	reviewCallback: function(res, target){
		if(! res.status){
			var $obj = target.parents('form').find('.err_info');
			$obj.html(res.data.info);
			$obj.addClass('active');
		}else{
			var $obj = target.parents('form').find('.success_info');
			$obj.html(res.data.info);
			$obj.addClass('active');
			setTimeout(function(){
				$obj.removeClass('active');
			}, 2000);

			if(res.data.html){
				$('#customer_comment').children('.titles').after(res.data.html);
			}
		}
	}	
};


var B = new basic();
+function($){
	var device_type = B.returnDeviceType();

	// 注册
	$('.btn_register').click(function(){
		B.submit(this);
	});
	// 登录
	$('.btn_login').click(function(){
		B.submit(this);
	});

	$('.btn_contact').click(function(){
		B.submit(this);
	});

	$('.btn_contact_product').click(function(){
		B.submit(this);
	});

	// 忘记密码
	$('.btn_reset_password').click(function(){
		B.submit(this);
	});

	$('.txt').bind('blur', B.checkBlurText);
	$('.ipt_captcha').bind('blur', B.checkBlurText);

	$('.btn_buiness').click(function(){
		B.submit(this);
	});

	// 产品列表分页
	$('.btn_page').click(function(){
		var $this = $(this);
		var page = $this.attr('page');
		if(page == 'next' || page == 'prev'){
			var current_page = $this.parent().find('.btn_page.active').attr('page');
		}else{
			var current_page = 0;
		}

		ajaxObj.getNextPage('/Product/gotoPage', {page: page, current_page: current_page}, $this, device_type);
	});

	// 产品评论列表分页
	$('.btn_page_review').click(function(){
		var $this = $(this);
		var page = $this.attr('page');
		var sum_page = $this.parent().find(".review_sum_pages").val();
		if(! isNaN(page)){
			// 大于总页数
			if(page > sum_page){
				return ;
			}
		}
		var tpl = $this.parent().find('.tpl_file').val();
		var item_id = $this.parent().find('.item_id').val();
		if(page == 'next' || page == 'prev'){
			var current_page = $this.parent().find('.btn_page_review.active').attr('page');
		}else{
			var current_page = 0;
		}


		ajaxObj.getNextPageReview('/Product/reviewGotoPage', {page: page, current_page: current_page, item_id: item_id, tpl: tpl}, $this, device_type);
	});

	// 加载更多
	$('.btn_more_product').click(function(){
		var $this = $(this);
		$this.parent().find('.loading').show();
		$this.hide();
		var page = parseInt($this.attr('page'));
		var cate_id = $this.attr("cate-id");
		ajaxObj.getNextPage('/Product/gotoPage', {page: page + 1, cate_id: cate_id}, $this, device_type);
	});

	// 加载更多
	$('.btn_more_product_review').click(function(){
		var $this = $(this);
		$this.parent().find('.loading').show();
		$this.hide();
		var page = parseInt($this.attr('page'));
		var tpl = $this.parent().find('.tpl_file').val();
		var item_id = $this.next('.item_id').val();
		ajaxObj.getNextPageReview('/Product/reviewGotoPage', {page: page + 1, item_id: item_id, tpl: tpl}, $this, device_type);
	});

	$('.btn_review').click(function(){
		var $this = $(this);
		var $form = $this.parents('form');
		var status = B.checkInput($form);
		if(! status){
			return false;
		}
		var form_data = $form.serialize();
		if(form_data){
			ajaxObj.post('/product/actionReview', form_data, 'reviewCallback', $this);
		}
	});

	$('.btn_captcha_refresh').click(function(){
		var $this = $(this);
		var url = $this.attr('src');
		var url_ar = url.split('/');
		var len = url_ar.length - 1;
		var new_url = '';
		for(var i in url_ar){
			if(i != len){
				new_url += url_ar[i] + '/';
			}
		}
		var rand = Math.random();
		$this.attr('src', new_url + rand);
	});

	$('.ipt_captcha').focus(function(){
		var $obj = $(this).parents('form').find('.err_info');
		if($obj.hasClass('active')){
			$obj.removeClass('active');
		}
	});

	// 选择语言
	$('.btn_language').click(function(){
		var $obj = $(this).find('ul');
		if($obj.hasClass("active")){
			$obj.removeClass('active');
		}else{
			$obj.addClass('active');
		}
	});

	// 产品图片
	$('.pic_small span').mouseover(function(){
		var $this = $(this);
		$this.parent().find('span').removeClass('hover');
		$this.addClass('hover');
		var pid = $this.attr('sid');
		var $parent = $this.parent().parent().parent().find('.pic_base');
		$parent.find('img').removeClass('active');
		$parent.find('img#' + pid).addClass('active');
	});

	// 产品明细选择国家
	$('.btn_select_country').click(function(){
		var $this = $(this);
		$this.parents('#market_list').find('.btn_select_country').removeClass('hover');
		$this.addClass('hover');
	});

	// 产品明细选择颜色
	$('.btn_choose_color').click(function(){
		var $this = $(this);
		var $parent = $this.parents('.item_prop');
		$parent.find('.btn_choose_color').removeClass('hover');
		$this.addClass('hover');
	});

	$('.product_slider_nav .product_slider_nav_li').click(function(){
		var i = $(this).index();
		$(this).addClass('hover').siblings('li').removeClass('hover');
		$('div.wrapper_block').eq(i).addClass('show_block').siblings('div.wrapper_block').removeClass('show_block');
		window.location.href = '#ptop';
	});

	// FAQ show
	$('.faq_list dt').click(function(){
		$(this).toggleClass('hover').parent('.faq_list').siblings('.faq_list').children('dt').removeClass('hover');	
		$(this).next('dd').slideToggle(0).parent('.faq_list').siblings('.faq_list').children('dd').hide();
	});

	$('.small_screen_title').click(function(){
		var $obj = $(this).next('.wrapper_block');
		if($obj.css('display') == 'none'){
			$obj.show();
		}else{
			$obj.hide();
		}
	});

	// 评星
	$(".btn_review_rate").click(function(){
		var $this = $(this);
		var $next = $this.nextAll('span').removeClass('active');
		var star = $this.attr('star');
		$this.parent().find('.review_rate').val(star);
		$this.addClass('active');
		$this.prevAll('span').addClass('active');
	});

	$(".btn-more").click(function(){
		var $this = $(this);
		var $parent = $this.parent(".has-more");
		if($parent.hasClass("active")){
			$parent.removeClass("active");
		}else{
			$parent.addClass("active");
		}
	});

	$(".btn-show-search").click(function(){
		var $obj = $(".m-search-box");
		if($obj.hasClass("active")){
			$obj.removeClass("active");
		}else{
			$obj.addClass("active");
		}
	});

	$(".p-btn-show-search").click(function(){
		var $obj = $(".search-box");
		if($obj.css("display") == "none"){
			$obj.show();
		}else{
			$obj.hide();
		}
	});

	var next_i = 0;
	$(".img-next").click(function(){
		var count = $(this).parent().find(".img-num").val();
		var num = count - 4;
		var $obj = $(".img-wrap");
		var left = $obj.offset().left;
		if(next_i == num){
			return ;
		}else{
			var offset = left - 135;
			
			next_i++;
		}	
		$obj.animate({"left": offset + "px"});			
	});

	$(".img-prev").click(function(){
		var num = next_i;
		var $obj = $(".img-wrap");
		if(num == 0){
			return ;
		}
		var left = $obj.offset().left;
		var offset = left + 135 - 67 - 67;
		$obj.animate({"left": offset + "px"});
		next_i--;
	});


	$(".show-big").mouseover(function(){
		var key = $(this).attr("sid");
		$("#lg-img-" + key).addClass("active");
	}).mouseout(function(){
		var key = $(this).attr("sid");
		$("#lg-img-" + key).removeClass("active");
	});

	$(".show-big").mousemove(function(e){
		var x = e.offsetX;
        var y = e.offsetY;
        var top = y * 1.8 - 206;
        var left = x * 1.8 - 174;
        if(top > 450){
            top = 450;
        }
        if(left > 270){
            left = 270;
        }       
        $(".lg-img img").css({"top": "-" + top + "px", "left": "-" + left+ "px"});
	});

}(jQuery);


