$(window).load(function(){
//	$('#textTop').css("top",($(window).height()-$('#textTop').height())/2);
	$('#textTop').css("left",($(window).width()-$('#textTop').width())/2);
	$('#textTop').animate({top:($(window).height()-$('#textTop').height())/2+50},300,"swing");
	$('#textTop').animate({top:($(window).height()-$('#textTop').height())/2},300,"swing");
});
$(window).scroll(function (){
	if($(document).scrollTop()>=$('.top').height()){
		$('.menuBar').addClass('fixed-top');
		$('#content').css("margin-top",$('.menuBar').height());
	}
	else{
		$('.menuBar').removeClass('fixed-top');
		$('#content').css("margin-top","0px");
	}
});
/*$(window).on('scroll', function(){
	$timeline_block.each(function(){
		if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
			$(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
		}
	});
});*/
$(document).ready(function(){
	$('#textTop').click(function(){
		$("html").animate({scrollTop:$('.top').height()},500);
		});
});