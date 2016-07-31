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
	/*Hot Products page turning*/
	//$('#hp_list')
	/*var hp_item = $('#hp_list'),
		_num = 1,
		r_width = 0,
		_left = 0,
		v_width = hp_item.parent().outerWidth(),
		hp_item_num = hp_item.children('.hp_item').length,
		hp_item_width = hp_item.children('.hp_item').outerWidth(),
		hp_width = hp_item_num * (hp_item_width + 14),
		h_width = hp_item.css('width', hp_width + 'px');

	$('.js_prev').click(function(){

	});
	$('.js_next').click(function(){
		r_width = h_width - v_width;
		if(r_width > 0) {
			_num++;
			_left = (-1) * _num * v_width;
		}
		hp_item.css('left', _left);
	});*/
	/*Brands Horizontal scrolling*/
	(function($) {
		$(function() { //on DOM ready
			$("#scroller").simplyScroll();
		});
	})(jQuery);
});