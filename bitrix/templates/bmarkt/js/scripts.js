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
 });