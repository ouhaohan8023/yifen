/**
 * Created by ouhaohan on 17/6/9.
 */
$(document).ready(function(){
	var width = $(window).width();
	//alert(width);
	if(width<375){
		$('div #br').html('<br>');
		$('div #btn').css('padding-left','13px');
		$('div #lingqu').html('领取');
	}
});