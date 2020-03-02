
(function($) {
	$(function(){
	
	/* Product page tabs */
		$('ul.nav-tabs').on('click', 'li:not(.active)', function() {
		    $(this)
		      .addClass('active').siblings().removeClass('active')
		      .closest('div.tabs').find('div.tab-content')
		      .removeClass('active').eq($(this).index()).addClass('active');
		});

	/* Menu animated */
		$('.button-collapse').on('click', function openNav(){
			$('.button-collapse').css({display:'none'});
			$('#menu').css({display:'block'});

		});
		$('.closebtn').on('click', function closeNav() {
			$('.button-collapse').css({display:'block'});
			$('#menu').css({display:'none'});
			$('.closebtn').css({display:'none'});
		});

		/* Left menu */
		$('.sub-menu-trigger').on('click', function(){
			if(!$(this).hasClass('clicked')) {
				$(this).addClass('clicked');
				$('.sub-left').css({display:'block'});
			} else {
				$(this).removeClass('clicked');
				$('.sub-left').css({display:'none'});
			}
		});

	/* Load more items in catalogue */
		$('body').on('click', '#load-more-trigger', function(event){
			let last = $('.item').filter(':last').attr('data-id');
			$.ajax({
				type: 'POST',
				url:'../models/handler_shop.php',
				data: {
					start: last
				},
				error: function() {alert("Error..");},
			    success: function(data){
			    	if(last == 36) {
			    		$('#load-more-trigger').css({display:'none'});
			    	} else {
			    		$('.cat-wrap').append(data);
			    	}
		    	}
			});
			event.preventDefault();
		});

	/* Add to cart */
		$('body').on('click', '.buyme', function(event) {
			var id = $(this).attr('id');
			var price = $(this).attr('data-id');
			$.ajax({
			    type: 'POST',
			    url: 'index.php?page=cart',//'../controllers/cart.php',
			    data: {
			    	buy_id: id,
			    	good_price: price
			    },
			    error: function() {alert("Error..");},
			    success: function(data){
			       alert("The item is in your cart");
			    },
			});
		    event.preventDefault();
		});

		/* Remove from cart */
		$('body').on('click', '.cart-item-remove', function(event) {
			var cart_id = $(this).parent().attr('id');
			var good_id = $(this).parent().parent().attr('id');
			$.ajax({
				type: 'POST',
				url: 'index.php?page=cart',//'../controllers/cart.php',
				data: {
					remove_id: cart_id,
					cartgood_id: good_id
				},
				error: function(){
					alert("Error..");
				},
				success: function(data) {
					alert("The item was successfully removed from your cart");
				}
			});
		});

		/* Remove all from cart */
		$('body').on('click', '.button-remove-all', function(event) {
			$('.cart-item-remove').each(function(){
				var cart_id = $(this).parent().attr('id');
				var good_id = $(this).parent().parent().attr('id');
				$.ajax({
					type: 'POST',
					url: 'index.php?page=cart',//'../controllers/cart.php',
					data: {
						remove_id: cart_id,
						cartgood_id: good_id
					}
				});
			});
			alert("Items were successfully removed from your cart");
		});


		/* Change quantity */
		$("input[name='cart-count-minus']").on('click', function(event){
			var good_id = $(this).parent().parent().attr('id');
			var count = parseInt($(event.target).siblings("input[name='count']").val()) - 1;
			if (count >=1 ) {
				$.ajax({
					type: 'POST',
					url: 'index.php?page=cart',//'../controllers/cart.php',
					data: {
						cart_minus: good_id,
						quantity: count
					},
					error: function(){
						alert("Error..");
					},
					success: function(data){
						$(event.target).siblings("input[name='count']").val(count);
					}
				});
			}
		});

		$("input[name='cart-count-plus']").on('click', function(event){
			var good_id = $(this).parent().parent().attr('id');
			var count = parseInt($(event.target).siblings("input[name='count']").val()) + 1;
			$.ajax({
				type: 'POST',
				url: 'index.php?page=cart',//'../controllers/cart.php',
				data: {
					cart_plus: good_id,
					quantity: count
				},
				error: function(){
					alert("Error..");
				},
				success: function(data){
					$(event.target).siblings("input[name='count']").val(count);
				}
			});
		});

		/* Update order_info */
		$('.change_order').on('click', function(event) {
			var order_id = $(this).parent().attr('id');
			var date_complete = $(this).parent().find("input[name='date_comp']").val();
			var order_status = $(this).parent().find('select').val();

			$.ajax({
				type: 'POST',
				url: '../controllers/admin.php',
				data: {
					order_id: order_id,
					date_complete: date_complete,
					order_status: order_status
				},
				error: function(){
					alert("Error..");
				},
				success: function(data){
					alert("The order has been changed!");
				}
			});
		});

		$('.view_details').on('click', function(event) {
			$('.order_details').empty();
			var order_id = $(this).parent().attr('id');

			$.ajax({
				type: 'POST',
				url: '../models/order_details.php',
				data: {
					order_details: order_id
				},
				error: function(){
					alert("Error..");
				},
				success: function(data){
					$('.order_details').append(data);
				}
			});
		});






	});
})(jQuery);