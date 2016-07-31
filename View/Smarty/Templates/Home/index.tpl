{include file="Home/header.tpl"}
<!--Navigation-->
{include file="Home/nav.tpl"}
<!--Banner-->
<div class="banner">
	<div class="container-fluid">
		<!--slide-->
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<div class="indicators-content">
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>
			</div>
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="/Global/Style/Home/images/banner.png" alt="">
				</div>
				<div class="item">
					<img src="/Global/Style/Home/images/banner.png" alt="">
				</div>
				<div class="item">
					<img src="/Global/Style/Home/images/banner.png" alt="">
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<!--contacts-->
		<div class="banner_contact">
			<h3 class="contact_title">Contact</h3>
			<form id="validate_form" method="POST" action="/Inquiry" enctype="multipart/form-data">
				<div class="form-group">
					<label class="sr-only">message</label>
					<textarea class="form-control" rows="3" name="content" placeholder="message" data-bv-field="content"></textarea>
				</div>
				<div class="form-group">
					<label class="sr-only">name</label>
					<input type="text" class="form-control" name="name" placeholder="name" data-bv-field="name">
				</div>
				<div class="form-group">
					<label class="sr-only">email</label>
					<input type="email" class="form-control" name="email" placeholder="email" data-bv-field="email">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-block btn-orange">Send it</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--Hot Products-->
<div class="hot_products">
	<div class="container-fluid">
		<div class="hp_header clearfix">
			<h3 class="hp_title">Hot Products</h3>
			<div class="hp_page clearfix">
				<a class="prev_menu js_prev" href="javascript:;"><</a>
				<a class="next_menu js_next" href="javascript:;">></a>
			</div>
		</div>
		<div class="hp_box">
			<div class="hp_items clearfix">
				{assign var="i" value="1"}
				{foreach $hotProducts as $product}
				<div class="hp_item">
					<a class="hp_item_img" href="/Product/{$product->getId()}">
						<span>
							{if $product->getLogo()->getId() > 0}
							<img src="{$product->getLogo()->getFileURL(250, 200)}" >
							{else}
							<img src="/Global/Style/Home/images/product_img.png" >
							{/if}
						</span>
					</a>
					<div class="hp_item_details">
						<h4 class="hp_item_title"><a href="/Product/{$product->getId()}">{$product->getTitle()}</a></h4>
						<p class="hp_item_model">Model:{$product->getModel()}</p>
						<p class="hp_item_brand">Brand:{$product->getBrand()->getName()}</p>
						<div class="text-center">
							<a class="btn btn-orange" href="/Inquiry/Product/{$product->getId()}">Inquiry</a>
						</div>
					</div>
				</div>
					{if $i == 5}
			</div>
			<div class="hp_items clearfix">
					{/if}
					{assign var="i" value=$i+1}
				{/foreach}
			</div>
		</div>
	</div>
</div>
<!--Featured Categories-->
<div class="featured_categories">
	<div class="container-fluid">
		<div class="fc_header clearfix">
			<h3 class="fc_title">Featured Categories</h3>
			<a class="fc_more" href="/Product">more</a>
		</div>
		<div class="fc_content clearfix">
			<div class="fc_add js_item">
				<a href="javascript:;" target="_blank">
					<img src="/Global/Style/Home/images/fc_add.png">
				</a>
			</div>
			<div class="fc_items">
				{assign var="i" value="0"}
				{foreach $featuredCategories as $info}
					{assign var="i" value=$i+1}
				<div class="fc_item js_item">
					<a href="{$info['href']}">
						<span class="fc_item_img"><b><img src="{$info['img']}"></b></span>
						<p class="fc_item_title">{$info['title']}</p>
					</a>
				</div>
				{if $i % 4 == 0}
				<div class="bar"></div>
				{/if}
				{/foreach}
			</div>
		</div>
	</div>
</div>
<!--Brands-->
<div class="brands">
	<div class="container-fluid">
		<div class="brands_header clearfix">
			<h3 class="brands_title">Brands</h3>
			<a class="brands_more" href="/Product">more</a>
		</div>
		<div class="brands_items clearfix">
			<ul id="scroller" class="list-unstyled clearfix">
				{foreach $brandList as $brand}
				<li>
					<a href="javascript:;">
						<span>
						{if $brand->getLogo()->getId() > 0}
							<img src="{$brand->getLogo()->getFileURL()}"/>
						{else}
						{$brand->getName()}
						{/if}
						</span>
					</a>
				</li>
				{/foreach}
			</ul>
		</div>
	</div>
</div>
<!--Passion-->
<div class="passion">
	<div class="container-fluid clearfix">
		<div class="passion_news">
			<h3 class="news_title"><a href="/News" target="_blank">News</a></h3>
			<ul class="list-unstyled">
				{foreach $newsList as $news}
				<li>
					<a href="/News/{$news->getId()}">{$news->getTitle()}</a>
					<span class="news_data">{$news->getCreateTime()|date_format:"%A, %B %e, %Y"}</span>
				</li>
				{/foreach}
			</ul>
		</div>
		<div class="about_passion">
			<h3 class="passion_title">About Passion</h3>
			<div class="passion_content">
				<p class="em">WELCOME TO PASSION ELEVATOR PARTS LIMITED!</p>
				<p>We are a trading and manufacturing company in all kinds of elevator&escalator parts,our SPARE PARTS CENTER located in NINGBO PORT CHINA,while our DOOR SYSTEM FACTORY placed in SUZHOU CHINA. Until now we already have many good customers all around the world,european,southeast asia,america and so on. All the big player's spare parts can be reached here,like KONE,SCHINDLER,OTIS,MITSUBISHI,SIGMA(LG-OTIS),THYSSEN and so on,you can also find nice quality Mitsubishi&Selcom style door system in our factory.</p>
				<p>We have many powerful suppliers to be our support in elevator&escalator parts business,and more good suppliers keep increasing in our list while the weak ones will be deleted with the time past. <a class="passion_more" href="/About">more</a></p>
			</div>
		</div>
	</div>
</div>
<!--Footer-->
{include file="Home/footer.tpl"}
