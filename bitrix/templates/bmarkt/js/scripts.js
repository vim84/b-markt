// A.V.Plotnikov, pure-solutions.ru

$(document).ready(function(){
	// Fancybox
	$(".fancybox").fancybox(
		{
		prevEffect : 'none',
		nextEffect : 'none',
		padding	: 20,
		helpers	: {
			//title : {type : 'inside'}
			title : false
		}
	});
	
	// переключение изображениий в карточке товара
	$(".product_gallery .thumbs ul li a").click(function(){
		
		var linkRel = $(this).attr("data-img");
		$(".product_gallery .big_image #" + linkRel).show().siblings("a").hide();
		
		$(this).parent().addClass("active").siblings("li").removeClass("active");
	
		return false;
	});
	
	// Добавление товара в корзину
	$(".add-to-cart").click(function(){
		var thisProductId = $(this).attr("data-product-id");
		var thisButton = $(this);

		$.ajax({
			type: "POST",
			url: "/ajax-requests/add-to-cart.php",
			data: {productId: thisProductId, ajax_filter: "y"}
		}).done(function(html) {
			// Деактивируем кнопку покупки и поменяем текст
			$(thisButton).addClass("disabled").text("В корзине");
			$("#basket").html(html);
			
		}).fail(function() {
			console.error("Ajax-запрос на добавление товара в корзину не отработал.");
		});

		return false;
	});
 });