$( document ).ready(function() {

	function showCart(cart){
		$('#cart .modal-body').html(cart);
		$('#cart').modal();
	};

	function getCart(){
		$.ajax({
			url: '/cart/show',
			type: 'GET',
			success: function(res){
				if(!res) alert('Ошибка!');
				showCart(res);
			},
			error: function(){
				alert('Error!');
			}
		});
		return false;
	}

	$('.cart_link').on('click', function(e){
		e.preventDefault();
		$.ajax({
			url: '/cart/show',
			type: 'GET',
			success: function(res){
				if(!res) alert('Ошибка!');
				showCart(res);
			},
			error: function(){
				alert('Error!');
			}
		});
	});

	$('#cart .modal-body').on('click', '.del-item', function(){
		var id = $(this).data('id');
		$.ajax({
			url: '/cart/del-item',
			data: {id: id},
			type: 'GET',
			success: function(res){
				if(!res) alert('Ошибка!');
				showCart(res);
			},
			error: function(){
				alert('Error!');
			}
		});
	});

	function clearCart(){
		$.ajax({
			url: '/cart/clear',
			type: 'GET',
			success: function(res){
				if(!res) alert('Ошибка!');
				showCart(res);
			},
			error: function(){
				alert('Error!');
			}
		});
	};

	$('.add-to-cart').on('click', function(e){
		e.preventDefault();
		var id = $(this).data('id'),
			qty = $('#qty').val();
		$.ajax({
			url: '/cart/add',
			data: {id: id, qty: qty},
			type: 'GET',
			success: function(res){
				if(!res) alert('Ошибка!');
				showCart(res);
			},
			error: function(){
				alert('Error!');
			}
		});
	});

	$('.add-to-cart').on('click', function(e){
		e.preventDefault();
		var id = $(this).data('id'),
			qty1 = $('#countItem').text();
		$.ajax({
			url: '/cart/add',
			data: {id: id, qty: qty},
			type: 'GET',
			success: function(res){
				if(!res) alert('Ошибка!');
				showCart(res);
			},
			error: function(){
				alert('Error!');
			}
		});
	});
	$('.name_sort').on('click', function(){
		$('.order_sort').toggle();
	});

	/* Аккордеон в категориях */

	var openItem = false;
	if($.cookie("openItem") && $.cookie("openItem") != 'false'){
		var openItem = parseInt($.cookie("openItem"));
	}
	$("#accordion").accordion({
		header: 'h3',
		active: openItem,
		collapsible: true,
		heightStyle: "content"
	});
	$("#accordion h3").click(function(){
		$.cookie("openItem", $("#accordion").accordion("option", "active"));
	});
	$("#accordion > li").click(function(){
		$.cookie("openItem", null);
		var link = $(this).find('a').attr('href');
		window.location = link;
	});
	/* Аккордеон в категориях */
});



