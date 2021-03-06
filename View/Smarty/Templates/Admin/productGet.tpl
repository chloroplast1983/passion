{include file="Admin/header.tpl"}
<h3><em></em>商品管理</h3>
<div class="submsg">
	<h5><a href="/Admin/Product?filter[status]=0">返回商品列表</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>商品标题</th>
			<td>{$product->getTitle()}</td>
		</tr>
		<tr>
			<th>添加时间</th>
			<td>{$product->getCreateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
		</tr>
		<tr>
			<th>更新时间</th>
			<td>{$product->getUpdateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
		</tr>
		<tr>
			<th>品牌</th>
			<td>{$product->getBrand()->getName()}</td>
		</tr>
		<tr>
			<th>分类</th>
			<td>{$product->getCategory()->getName()}</td>
		</tr>
		<tr>
			<th>Model</th>
			<td>{$product->getModel()}</td>
		</tr>
		<tr>
			<th>Goods No.</th>
			<td>{$product->getNumber()}</td>
		</tr>
		<tr>
			<th>MOQ</th>
			<td>{$product->getMoq()}</td>
		</tr>
		<tr>
			<th>Warranty Time</th>
			<td>{$product->getWarrantyTime()}</td>
		</tr>	
		<tr>
			<th>Certificates</th>
			<td>{$product->getCertificates()}</td>
		</tr>
		<tr>
			<th>关键词</th>
			<td>{$product->getSeoKeyWord()}</td>
		</tr>
		<tr>
			<th>描述</th>
			<td>
			{$product->getSeoDescription()}
			</td>
		</tr>
		<tr>
			<th>logo</th>
			<td>
			{if $product->getLogo()->getId() > 0}
			<img src="{$product->getLogo()->getFileURL()}"/>
			{else}
			无
			{/if}
			</td>
		</tr>	
		{if $product->getSlides() neq ""}
		{foreach $product->getSlides() as $slide}
		<tr>
			<th>轮播图&nbsp;{$slide@index+1}</th>
			<td><img src="{$slide->getFileURL()}" width="100" height="100"/></td>
		</tr>
		{/foreach}
		{/if}
		<tr>
			<th>内容</th>
			<td>{html_entity_decode($product->getContent())}</td>
		</tr>		
	</table>
</div>
{include file="Admin/footer.tpl"}