		<div class="aside">	
			<div class="side_menu">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#products" aria-controls="products" role="tab" data-toggle="tab">Products</a></li>
					<li role="presentation"><a href="#brands" aria-controls="brands" role="tab" data-toggle="tab">Brands</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="products">
						<dl class="side_menu_items">
							<dt>
								<a href="/Product?filter[status]=0">Escalator Parts</a>
							</dt>
							{foreach $categoryList['type'][1] as $parentCategory}
							<dd class="side_has_submenu">
								<a href="javascript:;">{$parentCategory->getName()}</a>
								{if $categoryList['parent'][$parentCategory->getId()] neq ""}
								<ul class="side_submenu list-unstyled">
									{foreach $categoryList['parent'][$parentCategory->getId()] as $category}
									<li><a href="javascript:;">{$category->getName()}</a></li>
									{/foreach}
								</ul>
								{/if}
							</dd>
							{/foreach}
						</dl>
						<dl class="side_menu_items">
							<dt>
								<a href="/Product?filter[status]=0">Elevator Parts</a>
							</dt>
							{foreach $categoryList['type'][2] as $parentCategory}
							<dd class="side_has_submenu">
								<a href="javascript:;">{$parentCategory->getName()}</a>
								{if $categoryList['parent'][$parentCategory->getId()] neq ""}
								<ul class="side_submenu list-unstyled">
									{foreach $categoryList['parent'][$parentCategory->getId()] as $category}
									<li><a href="javascript:;">{$category->getName()}</a></li>
									{/foreach}
								</ul>
								{/if}
							</dd>
							{/foreach}
						</dl>
<!-- 						<dl class="side_menu_items">
							<dt><a href="javascript:;">See All</a></dt>
						</dl> -->
					</div>
					<div role="tabpanel" class="tab-pane" id="brands">
						<ul class="side_brands_items list-unstyled">
							{foreach $brandList as $brand}
							<li>
								<a href="/Product?filter[status]=0&filter[brand]={$brand->getId()}">
									{if $brand->getLogo()->getId() > 0}
									<img src="{$brand->getLogo()->getFileURL()}"/>
									{else}
									{$brand->getName()}
									{/if}
								</a>
							</li>
							{/foreach}
						</ul>
					</div>
				</div>
			</div>

			<div class="side_contact">
				<div class="side_contact_title">
					<h3>Contact us</h3>
				</div>
				<div class="side_contact_content">
					<h3 class="scc_title">XI'AN PASSION ELEVATOR PARTS CO.LTD</h3>
					<ul class="list-unstyled">
						<li><b>E-mail: </b><a href="javascript:;">info@passionelevator.com</a></li>
						<li><b>SKype: </b>sale@passionelevator.com</li>
						<li><b>Whatsapp: </b>+86 15339083622</li>
						<li><b>Tel: </b>+86 15339083622</li>
					</ul>
				</div>
			</div>
		</div>