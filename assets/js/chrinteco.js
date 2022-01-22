$(document).ready(function(){

	  	
	 
	var flag = false;
	var scroll;

	$(window).scroll(function(){
		scroll = $(window).scrollTop();

		if(scroll > 80){
			if(!flag){
				 

				$(".navbar").css({"background-color": "rgba(0, 94, 68,0.9)"});
				 flag = true;
			}
		}else{
			if(flag){
				 
				//$(".navbar").css({"background-color": "rgba(23, 32, 42,1)",height: "78px"});
				$(".navbar").css({"background-color": "rgba(0, 94, 68,1)"});
			 
				flag = false;
			}
		}


	});

});
 
	jQuery(document).ready(function() {
		jQuery("#IrArriba").hide();
		jQuery(function () {
			jQuery(window).scroll(function () {
				if (jQuery(this).scrollTop() > 200) {
				jQuery('#IrArriba').fadeIn();
				} else {
				jQuery('#IrArriba').fadeOut();
				}
			});
			jQuery('#IrArriba a').click(function () {
				jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
});

//Menu dropdown hober
!function(e,n){var o=e();e.fn.dropdownHover=function(t){return"ontouchstart"in document?this:(o=o.add(this.parent()),this.each(function(){function r(){d.parents(".navbar").find(".navbar-toggle").is(":visible")||(n.clearTimeout(a),n.clearTimeout(i),i=n.setTimeout(function(){o.find(":focus").blur(),v.instantlyCloseOthers===!0&&o.removeClass("open"),n.clearTimeout(i),d.attr("aria-expanded","true"),s.addClass("open"),d.trigger(h)},v.hoverDelay))}var a,i,d=e(this),s=d.parent(),u={delay:500,hoverDelay:0,instantlyCloseOthers:!0},l={delay:e(this).data("delay"),hoverDelay:e(this).data("hover-delay"),instantlyCloseOthers:e(this).data("close-others")},h="show.bs.dropdown",c="hide.bs.dropdown",v=e.extend(!0,{},u,t,l);s.hover(function(e){return s.hasClass("open")||d.is(e.target)?void r(e):!0},function(){n.clearTimeout(i),a=n.setTimeout(function(){d.attr("aria-expanded","false"),s.removeClass("open"),d.trigger(c)},v.delay)}),d.hover(function(e){return s.hasClass("open")||s.is(e.target)?void r(e):!0}),s.find(".dropdown-submenu").each(function(){var o,t=e(this);t.hover(function(){n.clearTimeout(o),t.children(".dropdown-menu").show(),t.siblings().children(".dropdown-menu").hide()},function(){var e=t.children(".dropdown-menu");o=n.setTimeout(function(){e.hide()},v.delay)})})}))},e(document).ready(function(){e('[data-hover="dropdown"]').dropdownHover()})}(jQuery,window);

  