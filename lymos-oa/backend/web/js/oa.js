(function(){
	var oa = {
		ajaxSubmit: function(){
			var $form = $(this).parents("form");
			var url = $form.prop("action"),
				form_data = $form.serialize();
			oa.post(url, form_data);
		},
		// 删除列表项
		ajaxDeleteItem: function(){
			var id = $(this).prop("data-id"),
				url = localtion.href + "/deleteItem";
			oa.post(url, {id: id});
		},
		post: function(url, data){
			$.ajax({
				type: "post",
				data: data,
				url: url,
				success: function(res){
					console.log(res);
					oa.ajaxCallback(res);			
				}
			});
		},
		get: function(){
			$.ajax({
				type: "get",
				url: url,
				success: function(res){
			
				}
			});
		},
		ajaxCallback: function(data){

		},
		load: function(){
			$.load(url, data);
		}
	}
	window.oa = oa;
})();

+function($){
	$(".btn-submit").on("click", oa.ajaxSubmit);
	$(".btn-delete").on("click", oa.ajaxDeleteItem);


}(jQuery);
