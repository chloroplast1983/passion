{include file="Admin/header.tpl"}
<h3><em></em>产品管理</h3>
<div class="submsg">
	<h5><a href="/Admin/Product?filter[status]=0">返回产品列表</a></h5>
	<form method="post" action="" enctype="multipart/form-data">
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>标题</th>
			<td><input type="text" name="title" value="{$product->getTitle()}" class="txt"/></td>
		</tr>
		<tr>
			<th>品牌</th>
			<td>
				<select name="brand" class="select">
					{foreach $brandList as $brand}
					<option value="{$brand->getId()}">{$brand->getName()}</option>
					{/foreach}
				</select>
			</td>
		</tr>
		<tr>
			<th>分类</th>
			<td>
				<select name="" class="select categoryType">
					<option value="1" {if $product->getCategory()->getType() eq 1}selected="selected"{/if}>扶梯</option>
					<option value="2" {if $product->getCategory()->getType() eq 2}selected="selected"{/if}>直梯</option>
				</select>
				&nbsp;
				<select name="" class="select parentCategory">
					<option value="0">-----</option>
				</select>
				&nbsp;
				<select name="categroy" class="select categroy">
					<option value="0">-----</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Model</th>
			<td><input type="text" name="model" value="{$product->getModel()}" class="txt"/></td>
		</tr>
		<tr>
			<th>Goods No.</th>
			<td><input type="text" name="number" value="{$product->getNumber()}" class="txt"/></td>
		</tr>
		<tr>
			<th>MOQ</th>
			<td><input type="text" name="moq" value="{$product->getMoq()}" class="txt"/></td>
		</tr>
		<tr>
			<th>Warranty Time</th>
			<td><input type="text" name="warrantyTime" value="{$product->getWarrantyTime()}" class="txt"/></td>
		</tr>
		<tr>
			<th>Certificates</th>
			<td><input type="text" name="certificates" value="{$product->getCertificates()}" class="txt"/></td>
		</tr>
		{if $product->getLogo()->getId() neq 0}
		<tr>
			<th>logo</th>
			<td><img src="{$product->getLogo()->getFileURL()}"/></td>
		</tr>
		<tr>
			<th>编辑上传logo</th>
			<td><input type="file" name="logo" value="" class="txt"/></td>
		</tr>
		{else}
		<tr>
			<th>logo</th>
			<td><input type="file" name="logo" value="" class="txt"/></td>
		</tr>
		{/if}
		<tr>
			<th>内容</th>
			<td>
		    <script id="container" name="content" type="text/plain">
    			{html_entity_decode($product->getContent())}
			</script>
			</td>
		</tr>
	</table>
	<input type="hidden" name="productId" value="{$product->getId()}"/>
	<input type="submit" name="" value="提交" class="submit" style="margin-left:380px;"/>
	</form>	
</div>
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/Global/Style/Admin/Script/admin-category.js"></script>
<script type="text/javascript">
jQuery(function ($) {
	Category.init();
	Category.selectedCategory = {$product->getCategory()->getParentId()}
})
</script>
<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>
{include file="Admin/footer.tpl"}