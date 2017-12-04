$(function(){

	$(".thumb").hover(function(){
		
		$(this).find('img').stop(true).css({
			"transition":"all 0.8s",
			"transform": "scale(1.3)"	
		});
		 $(this).find('.part').stop(true).css({
			"display":"block",
			"cursor": "pointer"	,
			"transition":"all 0.1s",
			
		});

	},function(){
		 $(this).find('.part').css("display","none");
		 $(this).find('img').css({
			"transition":"all 0.8s",
			"transform": "scale(1)"	
		});

	});
});
