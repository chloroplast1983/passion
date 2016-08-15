{include file="Home/header.tpl"}
<!--Navigation-->
{include file="Home/nav.tpl"}
<!--main-->
<div class="main">
	<div class="container-fluid clearfix"><!--add-->
		<!--span只是占位符，有广告的时候直接替换就可以-->
		<!-- <a class="add" href="javascript:;"><img src="/Global/Style/Home/images/ad2.png"></a> -->
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
							<li class="n"><span>Contact Person:</span>Abby Ji</li>
							<li class="e"><span>Email:</span> <a href="javascript:;">sale@passionelevator.com</a></li>
							<li class="s"><span>Skype:</span>sale@passionelevator.com</li>
							<li class="w"><span>Whatsapp:</span>0086 15339083622</li>
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
						<figure class="p_img_content"></figure>
					</div>
					<div role="tabpanel" class="tab-pane" id="faq">
						<p>This is a short list of our most frequently asked questions. For more information about Instagram, or if you need support, please visit our support center.</p>
						<h3>What is Instagram?</h3>
						<p>Instagram is a fun and quirky way to share your life with friends through a series of pictures. Snap a photo with your mobile phone, then choose a filter to transform the image into a memory to keep around forever. We're building Instagram to allow you to experience moments in your friends' lives through pictures as they happen. We imagine a world more connected through photos.</p>
						<h3>How much is your app?</h3>
						<p>$0.00 - available for free in the Apple App Store and Google Play store.</p>
						<h3>Where does the name come from?</h3>
						<p>When we were kids we loved playing around with cameras. We loved how different types of old cameras marketed themselves as "instant" - something we take for granted today. We also felt that the snapshots people were taking were kind of like telegrams in that they got sent over the wire to others - so we figured why not combine the two?</p>
						<h3>How did the idea come about?</h3>
						<p>We love taking photos. We always assumed taking interesting photos required a big bulky camera and a couple years of art school. But as mobile phone cameras got better and better, we decided to challenge that assumption. We created Instagram to solve three simple problems:</p>
						<p>Mobile photos always come out looking mediocre. Our awesome looking filters transform your photos into professional-looking snapshots.
						Sharing on multiple platforms is a pain - we help you take a picture once, then share it (instantly) on multiple services.
						Most uploading experiences are clumsy and take forever - we've optimized the experience to be fast and efficient.
						What other services are you compatible with?</p>
						<p>Currently, you can share your photos on a photo-by-photo basis on Flickr, Facebook, and Twitter. Additionally, if you specify a location with your photo, you can opt to have us check you in on Foursquare. Going forward, we plan on supporting additional services but have nothing else to announce at this time.</p>
						<h3>Are you hiring?</h3>
						<p>Absolutely, yes. If you're a talented engineer or designer we want to talk to you. Check out our jobs page.</p>
						<p>I have a technical problem or support issue I need resolved, who do I email?</p>
						<p>The best way to get in touch with us is to visit our support center.</p>
						<h3>Is there an API or developer program?</h3>
						<p>Developers can register for our api at our developer site.</p>
						<h3>How does privacy work?</h3>
						<p>We have adopted a follower model that means if you're "public" on Instagram, anyone can subscribe to follow your photos. We do, however, have a special private option. In this mode, a user can make sure he/she must approve all follow requests before they go through.</p>
						<h3>Who can see my photos?</h3>
						<p>All photos are public by default which means they are visible to anyone using Instagram or on the instagram.com website. If you choose to make your account private, then only people who follow you on Instagram will be able to see your photos.</p>
						<h3>How can I print my photos?</h3>
						<p>We save all the photos you process with Instagram to your camera roll. You can then sync with your computer and print as many as you'd like.</p>
						<h3>When are you going to make the app for Blackberry, Windows Phone 7, iPad, etc?</h3>
						<p>We are currently working on making the iPhone and Android experiences as solid as possible. Only then will we consider other platforms, but currently we have nothing to announce.</p>
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
			<div class="related_products">
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
			</div>
		</div>
	</div>
</div>
<div class="bar_40"></div>
<!--Footer-->
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
{include file="Home/footer.tpl"}