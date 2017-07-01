{include file="Home/header.tpl"}
<!--Navigation-->
{include file="Home/nav.tpl"}
<!--main-->
<div class="main">
	<div class="container-fluid clearfix"><!--add-->
		<!--span只是占位符，有广告的时候直接替换就可以-->
		<a class="add" href="javascript:;"><img src="/Global/Style/Home/images/ad2.png"></a>
<!--aside-->
{include file="Home/leftNav.tpl"}
<!--content-->
		<div class="content">
			<div class="site_navigation">
				<span>You are here:</span><a href="/">Home</a>><a href="/Product">products</a>>
				{if $product->getCategory()->getType()==1}
				<a href="/Product?filter[status]=0&filter[type]=1">Escalator Parts</a>>
				{/if}
				{if $product->getCategory()->getType()==2}
				<a href="/Product?filter[status]=0&filter[type]=2">Elevator Parts</a>>
				{/if}
				{if $product->getCategory()->getParentId() > 0}
				<a href="/Product?filter[status]=0&filter[parentCategory]={$parentCategory->getId()}">{$parentCategory->getName()}</a>>
				{/if}
				<a href="/Product?filter[status]=0&filter[category]={$product->getCategory()->getId()}">{$product->getCategory()->getName()}</a>>
				<span>{$product->getTitle()}</span>
			</div>
			<!--products intro-->
			<div class="product_intro clearfix">
				<div class="gallery_main">
					<div class="gallery">
						<div class="imagezoom_wrap">
							{if !empty($product->getSlides())}
							{assign var=slide value=current($product->getSlides())}
							<div class="image_view">
								<a href="javascript:;">
									<img class="triumph" src="{$slide->getFileURL(348, 320, 1)}">
								</a>
							</div>
							<div class="zoom_pup" id="move"></div>
							<div id="detailPic" class="imagezoom_lens">
								<img src="{$slide->getFileURL(696,640,1)}}">
							</div>
							{/if}
						</div>
						<div class="enlarge_image_bar"><span>Enlarge Image</span></div>
						<div class="thumb_items">
							{if !empty($product->getSlides())}
							<ul id="thumblist" class="list-unstyled">
								{foreach $product->getSlides() as $slide}
								<li {if $slide@index==0}class="active"{/if} data-img="{$slide->getFileURL(350, 320, 1)}" data-zoom-img="{$slide->getFileURL()}">
									<a href="javascript:;">
										<img src="{$slide->getFileURL(60, 60, 1)}">
									</a>
									<i></i>
								</li>
								{/foreach}							
							</ul>
							{/if}	
						</div>
					</div>
					<div class="share_bar clearfix">
						<a class="add_favorites" href="javascript:;">Add to My Favorites</a>
						<div class="share_items">
							<span>Share to:</span>
							<a href="http://www.facebook.com/share.php?u=www.passionelevator.com"><img src="/Global/Style/Home/images/f.png" ></a>
							<a href="http://twitter.com/home/?status=passionelevator www.passionelevator.com"><img src="/Global/Style/Home/images/t.png" ></a>
							<a href="javascript:;"><img src="/Global/Style/Home/images/g.png" ></a>
							<a href="http://www.linkedin.com/shareArticle?mini=true&url=www.passionelevator.com&title=passionelevator"><img src="/Global/Style/Home/images/in.png" ></a>
						</div>
					</div>
				</div>
				<div class="product_info">
					<h3 class="p_title">{$product->getTitle()}</h3>
					<ul class="p_info_items list-unstyled">
						<li class="clearfix">
							<span class="dt">Name:</span>
							<span class="dd">{$product->getTitle()}</span>
						</li>
						<li class="clearfix">
							<span class="dt">Brand:</span>
							<span class="dd">{$product->getBrand()->getName()}</span>
						</li>
						<li class="clearfix">
							<span class="dt">Model:</span>
							<span class="dd">{$product->getModel()}</span>
						</li>
						<li class="clearfix">
							<span class="dt">Goods No.:</span>
							<span class="dd">{$product->getNumber()}</span>
						</li>
						<li class="clearfix">
							<span class="dt">MOQ:</span>
							<span class="dd">{$product->getMoq()}</span>
						</li>
						<li class="clearfix">
							<span class="dt">Warranty Time:</span>
							<span class="dd">{$product->getWarrantyTime()}</span>
						</li>
						<li class="clearfix">
							<span class="dt">Certificates:</span>
							<span class="dd">{$product->getCertificates()}</span>
						</li>
						<li class="clearfix">
							<span class="dt">Price:</span>
							<span class="dd">0,00</span>
						</li>
					</ul>
					<div class="p_contact">
						<ul class="list-unstyled">
							<li class="n"><span>Contact Person:</span>Mrs. Vicky</li>
							<li class="e"><span>Email:</span> <a href="mailto:sherry@passionelevator.coms">sherry@passionelevator.com</a></li>
							<li class="s"><span>Skype:</span><a href="skype:peng.sherry3?add">peng.sherry3</a></li>
							<li class="w"><span>Whatsapp:</span>+86 13309214901</li>
						</ul>
					</div>
					<div class="p_btn_bar clearfix">
						<a class="btn btn-orange" href="/Inquiry/Product/{$product->getId()}">Contact Now</a>
						<!--<a class="btn btn-orange-hollow" href="javascript:;">Inquiry Basket</a>-->
					</div>
				</div>
			</div>
			<!--products details-->
			<div class="product_details">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#product_detail" aria-controls="home" role="tab" data-toggle="tab">product details</a></li>
					<li role="presentation"><a href="#shipping_payment" aria-controls="profile" role="tab" data-toggle="tab">shipping/payment</a></li>
					<li role="presentation"><a href="#faq" aria-controls="messages" role="tab" data-toggle="tab">FAQ</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="product_detail">
						{html_entity_decode($product->getContent())}
					</div>
					<div role="tabpanel" class="tab-pane" id="shipping_payment">
						<figure class="p_img_content"><img src="/Global/Style/Home/images/shppingandpayment.jpg"></img></figure>
					</div>
					<div role="tabpanel" class="tab-pane" id="faq">
						<h3>Q:How to order?</h3>
						<p>A: inquiry→quotation→confirm→send PI→make the payment→arrange the parts→delivery→receive the parts</p>
						<h3>Q:Which shipping way is available and how to track?</h3>
						<p>A: By sea to your nearest port</p>
						<p>By air to your nearest airport</p>
						<p>By express (DHL,UPS,FEDEX,TNT,EMS)to your door</p>
						<p>When your order shipping out . we will provide you a tracking number. then you can know clearly the status of the goods</p>
						<h3>Q: What is the delivery:</h3>
						<p>A:  Motsly parts we have stock before you want to book with us pls email us and confirm the delivery time and price. Usually 1-5 working days.</p>
						<table class="table table-bordered content-table">
							<tbody>
								<tr>
									<th>DHL</th>
									<td>Around 3-5 working days</td>
								</tr>
								<tr>
									<th>FedEx</th>
									<td>Around 3-5 working days</td>
								</tr>
								<tr>
									<th>UPS/TNT</th>
									<td>Around 6-8 working days</td>
								</tr>
								<tr>
									<th>EMS</th>
									<td>Around 10-15 working days</td>
								</tr>
								<tr>
									<th>AIR</th>
									<td>Around 5-7 working days</td>
								</tr>
								<tr>
									<th>SEA</th>
									<td>Around 15-30 working days</td>
								</tr>
							</tbody>
						</table>
						<h3>Q: Sorry, I place a wrong order, the goods are not the one I need, can I exchange it?</h3>
						<p>A: Of course, common products are allowed to be exchanged as long as you pay the freight and custom cost</p>
						<h3>Q: Do you have any warranty for your parts?</h3>
						<p>A: Yes, we have warranty for our parts. 3 months for PCB, 2 years for original roller and other roller, 3-5 years for COMI roller and 1 year for Yaskawa inverter. Please contact us to get more information for other products.</p>
						<h3>Q: What should I do when the goods doesn’t work under warranty ?</h3>
						<p>A: You can send it back to repair ,but the freight and repair charge will be paid by you.</p>
						<h3>Q:Which payment way is available ?</h3>
						<p>A: TT, Western Union, Pay pal, You can choose a convinient way for you .</p>
						<p>Kindly contact our staff to get more answers. Thanks for your cooperation!!!"</p>
					</div>
				</div>
			</div>
			<!--Send your message to us-->
			<div class="send_message">
				<h3 class="sm_title">send your message to us</h3>
				<form id="validate_form" class="has_label">
					<div class="form-group">
						<label class="control-label"><i>*</i>Message</label>
						<div class="control-form">
							<textarea class="form-control" name="message" rows="4" placeholder="Enter your inquiry details such as product name,size,medol,FOB,etc." data-bv-field="message"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<label class="control-label"><i>*</i>name</label>
								<div class="control-form">
									<input type="text" class="form-control" name="name" placeholder="Name" data-bv-field="name">
								</div>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label class="control-label"><i>*</i>Email</label>
								<div class="control-form">
									<input type="email" class="form-control" name="email" placeholder="Email" data-bv-field="email">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-orange">Send</button>
					</div>
				</form>
			</div>
			<!--Related Products-->
<!-- 			<div class="related_products">
				<div class="rp_header clearfix">
					<h3 class="rp_title">Related Products</h3>
				</div>
				<div class="rp_items">
					<div class="rp_item js_item">
						<a class="rp_item_img" href="javascript:;">
							<span>
								<img src="/Global/Style/Home/images/product_img.png" >
							</span>
						</a>
						<div class="rp_item_details">
							<h4 class="rp_item_title"><a href="javascript:;">Elevator PCB elevator parts SI-JE2 K21A</a></h4>
							<p class="rp_item_model">Model:h05VVH6-F</p>
							<p class="rp_item_brand">Brand:JK/OEM</p>
							<div class="text-center">
								<a class="btn btn-orange" href="javascript:;">Inquiry</a>
							</div>
						</div>
					</div><!--//end item-->
				</div>
			<!-- </div> --> 
		</div>
	</div>
</div>
<div class="bar_40"></div>
<!--Footer-->
{include file="Home/footer.tpl"}
<script>
	$(document).ready(function(){
		$('#thumblist li').mousemove(function () {
			$('#thumblist li').removeClass('active');
			$(this).addClass('active');
			var src = $(this).attr('data-img'),
				zoom_img = $(this).attr('data-zoom-img');
			$('.triumph').attr('src', src);
			$('#detailPic img').attr('src',zoom_img);
		});

		$(".imagezoom_wrap").bind("mousemove", function(e) {
			var ev = e || event;
			var mouseX = ev.pageX;
			var mouseY = ev.pageY;
			var picLeft = $(".triumph").offset().left;
			var picTop = $(".triumph").offset().top;
			var picWidth = $(".triumph").width();
			var picHeight = $(".triumph").height();
			var xLength = parseInt(mouseX - picLeft);
			var yLength = parseInt(mouseY - picTop);
			var qWidth = picWidth / 4;
			var lastQWidth = picWidth - picWidth / 4;
			var qHeight = picHeight / 4;
			var lastQHeight = picHeight - picHeight / 4;
			$("#move").css("display","block");
			if (xLength < qWidth) {
				$("#move").css("left","0px");
			} else {
				if (xLength > lastQWidth) {
					$("#move").css("left", (lastQWidth - qWidth) + "px");
				} else {
					$("#move").css("left", (xLength - qWidth) + "px");
				}
			}
			if (yLength < qHeight) {
				$("#move").css("top", "0px");
			} else {
				if (yLength > lastQHeight) {
					$("#move").css("top", (lastQHeight - qHeight) + "px");
				} else {
					$("#move").css("top", (yLength - qHeight) + "px");
				}
			}
			$('#detailPic').css('display', 'block');
			$("#detailPic > img").css("left", parseInt($("#move").css("left")) * (-2) + "px").css("top", parseInt($("#move").css("top")) * (-2) + "px").css("position", "absolute");
		});
		$(".imagezoom_wrap").bind("mouseout", function () {
			$("#move").css("display","none");
			$('#detailPic').css('display', 'none');
		});

		$("a.add_favorites").bind("click", function(){

			sURL= window.location;
	        sTitle = document.title

	        sURL = encodeURI(sURL); 
	        try{   
	            window.external.addFavorite(sURL, sTitle);   
	        }catch(e) {   
	            try{   
	                window.sidebar.addPanel(sTitle, sURL, "");   
	            }catch (e) {   
	                alert("加入收藏失败，请使用Ctrl+D进行添加,或手动在浏览器里进行设置.");
	            }   
	        }
		});
	});
</script>
