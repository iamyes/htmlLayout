$( document ).ready(function() {

	/*$('.click_product a').on('click', function(event){
		var self = event;
		var id = $(this).parent('.click_product').data('id');
		var hit = $(this).parent('.click_product').data('hit');
			adminOption(self, id, hit)
		return false;
	});

	function adminOption(self, id, hit){
		
		$.ajax({
			url: '/admin/product/index',
			data: {id: id, hit: hit},
			type: 'GET',
			success: function(res){
				if($(self.currentTarget).hasClass('text-danger')){
					$(self.currentTarget).removeClass('text-danger glyphicon glyphicon-remove');
					$(self.currentTarget).addClass('text-success glyphicon glyphicon-ok');
				}else{
					$(self.currentTarget).removeClass('text-success glyphicon glyphicon-ok');
					$(self.currentTarget).addClass('text-danger glyphicon glyphicon-remove');
				}
			},
			error: function(){
				alert('Error!');
			}
		});
	
	}*/

/*обработка хитов*/
	$('.click_hit a').on('click', function(event){
		var id = $(this).parent('.click_hit').data('id');
			hit = $(this).parent('.click_hit').data('hit');
		$.ajax({
			url: '/admin/product/index',
			data: {id: id, hit: hit},
			type: 'GET',
			success: function(res){
				if($(event.currentTarget).hasClass('text-danger')){
					$(event.currentTarget).removeClass('text-danger glyphicon glyphicon-remove');
					$(event.currentTarget).addClass('text-success glyphicon glyphicon-ok');
				}else{
					$(event.currentTarget).removeClass('text-success glyphicon glyphicon-ok');
					$(event.currentTarget).addClass('text-danger glyphicon glyphicon-remove');
				}
			},
			error: function(){
				alert('Error!');
			}
		});
		return false;
	})
	/*обработка хитов*/

	/*обработка новинок*/
	$('.click_new a').on('click', function(event){
		var id = $(this).parent('.click_new').data('id');
		var nevv = $(this).parent('.click_new').data('new');
		$.ajax({
			url: '/admin/product/index',
			data: {id: id, new: nevv},
			type: 'GET',
			success: function(res){
				if($(event.currentTarget).hasClass('text-danger')){
					$(event.currentTarget).removeClass('text-danger glyphicon glyphicon-remove');
					$(event.currentTarget).addClass('text-success glyphicon glyphicon-ok');
				}else{
					$(event.currentTarget).removeClass('text-success glyphicon glyphicon-ok');
					$(event.currentTarget).addClass('text-danger glyphicon glyphicon-remove');
				}
			},
			error: function(){
				alert('Error!');
			}
		});
		return false;
	})
	/*обработка новинок*/

	/*обработка распродажи*/
	$('.click_sale a').on('click', function(event){
		var id = $(this).parent('.click_sale').data('id');
			sale = $(this).parent('.click_sale').data('sale');
		$.ajax({
			url: '/admin/product/index',
			data: {id: id, sale: sale},
			type: 'GET',
			success: function(res){
				if($(event.currentTarget).hasClass('text-danger')){
					$(event.currentTarget).removeClass('text-danger glyphicon glyphicon-remove');
					$(event.currentTarget).addClass('text-success glyphicon glyphicon-ok');
				}else{
					$(event.currentTarget).removeClass('text-success glyphicon glyphicon-ok');
					$(event.currentTarget).addClass('text-danger glyphicon glyphicon-remove');
				}
			},
			error: function(){
				alert('Error!');
			}
		});
		return false;
	})
	/*обработка распродажи*/

	/*обработка видимости*/
	$('.click_visible a').on('click', function(event){
		var id = $(this).parent('.click_visible').data('id');
			visible = $(this).parent('.click_visible').data('visible');
		$.ajax({
			url: '/admin/product/index',
			data: {id: id, visible: visible},
			type: 'GET',
			success: function(res){
				if($(event.currentTarget).hasClass('text-danger')){
					$(event.currentTarget).removeClass('text-danger glyphicon glyphicon-remove');
					$(event.currentTarget).addClass('text-success glyphicon glyphicon-ok');
				}else{
					$(event.currentTarget).removeClass('text-success glyphicon glyphicon-ok');
					$(event.currentTarget).addClass('text-danger glyphicon glyphicon-remove');
				}
			},
			error: function(){
				alert('Error!');
			}
		});
		return false;
	})
	/*обработка видимости*/
});