{include file="Home/header.tpl"}
<!--Header-->
{include file="Home/nav.tpl"}
<!--main-->
<div class="main">
	<div class="container-fluid clearfix">
		<!--add-->
		<!--span只是占位符，有广告的时候直接替换就可以-->
		<a class="add" href="javascript:;"><span class="add_img">广告位置</span></a>
<!--aside-->
{include file="Home/leftNav.tpl"}
<!--content-->
		<div class="content">
			<div class="site_navigation">
				<span>You are here:</span><a href="/">Home</a>><span>Inquiry</span>
			</div>
			<!--contact-->
			<div class="message_wrap">
				<p class="company">XI'AN PASSION ELEVATOR PARTS CO.LTD<<a href="mailto:vicky@passionelevator.com">vicky@passionelevator.com</a>></p>
				{if $product->getId() > 0}
				<div class="as_products clearfix">
					<span class="dt">Product:</span>
					<div class="m_rp_items">
						<div class="m_rp_item">
							<a class="m_rp_img" href="/Product/{$product->getId()}">
							{if $product->getLogo()->getId() > 0}
							<img src="{$product->getLogo()->getFileURL(60, 60, 1)}">
							{else}
							<img src="/Global/Style/Home/images/product_img.png" width="60" height="60">
							{/if}
							</a>
							<h3>{$product->getTitle()} {$product->getModel()}</h3>
							<a class="m_rp_details" href="/Product/{$product->getId()}">>>details</a>
						</div>
					</div>
				</div>
				{/if}
				<form id="validate_form" class="inquiry_body has_label" method="POST" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label class="label-control"><i>*</i>Message:</label>
						<textarea class="form-control" name="content" rows="6" placeholder="Enter your inquriy details such as product name,size,medol,FOB,etc." data-bv-field="message"></textarea>
						
					</div>
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<label class="label-control"><i>*</i>Email:</label>
								<input type="email" class="form-control" name="email" placeholder="Email" data-bv-field="email">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label class="label-control"><i>*</i>Name:</label>
								<input type="text" class="form-control" name="name" placeholder="Name" data-bv-field="name">
							</div>
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-orange">Send Inquiry</button>
					</div>
				</form>
			</div>
			<!--Related Products-->
			<div class="related_products">
				<div class="rp_header clearfix">
					<h3 class="rp_title">Hot Products</h3>
				</div>
				<div class="rp_items">
					{foreach $hotProducts as $product}
					<div class="rp_item js_item">
						<a class="rp_item_img" href="javascript:;">
							<span>
							{if $product->getLogo()->getId() > 0}
								<img src="{$product->getLogo()->getFileURL(250, 200, 1)}" >
							{else}
								<img src="/Global/Style/Home/images/product_img.png" >
							{/if}
							</span>
						</a>
						<div class="rp_item_details">
							<h4 class="rp_item_title"><a href="/Product/{$product->getId()}">{$product->getTitle()}</a></h4>
							<p class="rp_item_model">Model:{$product->getModel()}</p>
							<p class="rp_item_brand">Brand:{$product->getBrand()->getName()}</p>
							<div class="text-center">
								<a class="btn btn-orange" href="/Inquiry/Product/{$product->getId()}">Inquiry</a>
							</div>
						</div>
					</div>
					{/foreach}
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bar_40"></div>
<!--Footer-->
{include file="Home/footer.tpl"}