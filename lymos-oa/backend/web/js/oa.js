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
			if(! data.status){
				alert(data.message);
				return false;
			}
			switch(data.return_type){
				case "list_add":
					oa.callbackListAdd(data);
					break;
				case "list_delete":
					oa.callbackListDelete(data);
					break;
			}		
		},
		load: function(){
			$.load(url, data);
		},
		callbackListAdd: function(params){
			var $list_body = $("#list-body"),
				html = "<tr><td colspan='5'>ssss</td></tr>";
			$list_body.before(html);
		},
		callbackListDelete: function(params){

		}
	}
	window.oa = oa;
})();

+function($){
	$(".btn-submit").on("click", oa.ajaxSubmit);
	$(".btn-delete").on("click", oa.ajaxDeleteItem);


}(jQuery);
