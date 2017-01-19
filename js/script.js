var i=0;
$(window).load(function(){
//	$('#textTop').css("top",($(window).height()-$('#textTop').height())/2);
//	$('#textTop').css("left",($(window).width()-$('#textTop').width())/5);
	$('#textTop').css("left",100);
	$('#textTop').animate({top:($(window).height()-$('#textTop').height())/2+62},300,"swing");
	$('#textTop').animate({top:($(window).height()-$('#textTop').height())/2+12},300,"swing");
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
	var windowBottom = $(window).height();
	if($(document).scrollTop()>=$('#competence').position().top-windowBottom+500){
		if(i==0){
			$('.chart').easyPieChart({
				easing: 'easeOutBounce',
				animate : 2000,
				barColor : "#FFFFFF",
				trackColor : "#000022",
				onStep: function(from, to, percent) {
					$(this.el).find('.percent').text(Math.round(percent));
					i++;
				}
			});
		}
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
	$('#textTop .savoirPlus').click(function(){
		$("html").animate({scrollTop:$('.top').height()},500);
	});
	$('#resetBt').click(function(){
		$("html").animate({scrollTop:0},500);
	});
	
	$('#presentationBt').click(function(){
		$("html").animate({scrollTop:$('.top').height()},500);
	});
	$('#competenceBt').click(function(){
		$("html").animate({scrollTop:$('.top').height()+40+$('#presentation').height()},500);
	});
	$('#expBt').click(function(){
		$("html").animate({scrollTop:$('.top').height()+80+$('#presentation').height()+$('#competence').height()},500);
	});		
});