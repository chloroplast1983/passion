$(document).ready(function(){
	/*nav submenu show or hide */
	$('.has-submenu').hover(function(){
		$(this).addClass('shouMenu');
	},function(){
		$(this).removeClass('shouMenu');
	});
	
	/*Contact Validate*/
	$('#validate_form').bootstrapValidator({
		message: 'This value is not valid',
		fields: {
			content: {
				validators: {
					notEmpty: {
						message: 'The content cannot be empty'
					}
				}
			},
			name: {
				validators: {
					notEmpty: {
						message: 'The name cannot be empty'
					}
				}
			},
			email: {
				validators: {
					notEmpty: {
						message: 'The email cannot be empty'
					},
					emailAddress: {
						message: 'The input is not a valid email address'
					}
				}
			}
		}
	});

	/*list hover Special effects*/
	$('.js_item').hover(function(){
		$(this).addClass('item_active');
	},function(){
		$(this).removeClass('item_active');
	});

	/*side menu show sub menu*/
	$('.side_has_submenu').hover(function(){
		$(this).addClass('hover');
		$(this).find('.side_submenu').fadeIn();
	},function(){
		$(this).removeClass('hover');
		$(this).find('.side_submenu').fadeOut();
	});
	/*nav fixed to top*/
	$(window).scroll((
		function(){
			var bu=$(".main_nav"),bs=$(window);
			var bt=138;
			var bx;
			var bw=bs.scrollTop();
			var bv=function(){
				if(bx){
					clearTimeout(bx);
					bx=false;
				}
				bx=setTimeout(function(){
					var by=bs.scrollTop();

					if(by>bt+bw){
						bx=setTimeout(function(){
							bu.addClass("navbar-fixed-top");
						},0)
					}else{
						if(by<=bt+bw){
							bx=setTimeout(function(){
								bu.removeClass("navbar-fixed-top")
							},0)
						}
					}
				},50)
			};
			bv();
			return bv;
		}
	)());
	(function($) {
		$(function() { //on DOM ready
			$("#scroller").simplyScroll({
				speed : 5
			});
		});
	})(jQuery);
});