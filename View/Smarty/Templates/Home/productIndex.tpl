{include file="Home/header.tpl"}
<!--Navigation-->
{include file="Home/nav.tpl"}
<!--main-->
<div class="main">
	<div class="container-fluid clearfix">
<!--aside-->
{include file="Home/leftNav.tpl"}
<!--content-->
		<div class="content">
			<div class="site_navigation">
				<span>You are here:</span><a href="/">Home</a>><span>products</span>
			</div>
			{if !empty($productList)}
			<div class="products_items clearfix">
			   {foreach $productList as $product}
				<div class="product_item js_item">
					<a class="product_item_img" href="/Product/{$product->getId()}">
						<span>
							{if $product->getLogo()->getId() > 0}
							<img src="{$product->getLogo()->getFileURL(250, 200, 1)}" >
							{else}
							<img src="/Global/Style/Home/images/product_img.png" >
							{/if}
						</span>
					</a>
					<div class="product_item_details">
						<h4 class="product_item_title"><a href="/Product/{$product->getId()}">{$product->getTitle()}</a></h4>
						<p class="product_item_model">Model:{$product->getModel()}</p>
						<p class="product_item_brand">Brand:{$product->getBrand()->getName()}</p>
						<div class="text-center">
							<a class="btn btn-orange" href="/Inquiry/Product/{$product->getId()}">Inquiry</a>
						</div>
					</div>
				</div>
				{/foreach}
			</div>
			<nav class="list_pagination">
				{include file="Home/pages.tpl"}
			</nav>
			{else}
			<div class="search_results">
				<div class="sr_text">
					<h3 class="s_title">Search Results</h3>
					<div class="sr_table">
						<div class="sr_table_cell">
							<h4>Search Terms:"<b class="color_orange">creammmmm</b>"</h4>
							<p class="color_read">We have found 0 items that match "creammmmm".</p>
						</div>
					</div>
				</div>
				<div class="s_explain">
					<h4>Search Tips:</h4>
					<p>Reduce the number of keywords used, or use more general words.<br>
						Remember to use the full name, not just an acronym.<br>
						Try one of the keyword suggestions that are displayed as you type in the main search input and then use the filters to narrow the results.</p>
				</div>
			</div>
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
			{/if}
			<!--Send your message to us-->
			<div class="send_message">
				<h3 class="sm_title">send your message to us</h3>
				<form id="validate_form" class="has_label" method="POST" action="/Inquiry" enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label"><i>*</i>Message</label>
						<div class="control-form">
							<textarea class="form-control" name="content" rows="4" placeholder="Enter your inquiry details such as product name,size,medol,FOB,etc." data-bv-field="message"></textarea>
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
		</div>
	</div>
</div>
<div class="bar_40"></div>
<!--Footer-->
{include file="Home/footer.tpl"}