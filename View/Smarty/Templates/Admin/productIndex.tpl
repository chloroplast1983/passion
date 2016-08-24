{include file="Admin/header.tpl"}
<h3><em></em>商品管理</h3>
	<div class="submsg">
	<h5><a href="/Admin/Product/Save">添加商品</a></h5>

	<form method="get" action="/Admin/Product" enctype="multipart/form-data">
		<div class="search_bar cl">
			<div class="form-group">
				<label class="label-control">标题</label>
				<input type="text" class="txt" placeholder="请输入标题">
			</div>
			<div class="form-group">
				<label class="label-control">品牌</label>
				<select name="filter[brand]" class="select">
					<option value="0" selected="selected">-----</option>
					{foreach $brandList as $brand}
						<option value="{$brand->getId()}" {if $filter['brand'] == $brand->getId()}selected="selected"{/if}>{$brand->getName()}</option>
					{/foreach}
				</select>
			</div>
			<div class="form-group">
				<label class="label-control">分类</label>
				<select name="filter[type]" class="select categoryType">
					<option value="0">-----</option>
					<option value="1" {if $filter['type'] == 1}selected="selected"{/if}>扶梯</option>
					<option value="2" {if $filter['type'] == 2}selected="selected"{/if}>直梯</option>
				</select>
			</div>
			<div class="button-group">
				<input type="hidden" name="filter[status]" value="0">
				<input type="submit" name="" value="搜索" class="submit" />
			</div>
		</div>
	</form>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>商品标题</th>
			<th>编号</th>
			<th>商品类型</th>
			<th>商品分类</th>
			<th>品牌名称</th>
			<th>添加时间</th>
			<th>更新时间</th>
			<th>操作</th>
		</tr>
		{if $productList neq ""}
		{foreach $productList as $product}
		<tr>
			<td>{$product->getTitle()}</td>
			<td>{$product->getNumber()}</td>
			<td>{if $product->getCategory()->getType() eq 1}扶梯{else}直梯{/if}</td>
			<td>{$product->getCategory()->getName()}</td>
			<td>{$product->getBrand()->getName()}</td>
			<td>{$product->getCreateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
			<td>{$product->getUpdateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
			<td><a href="/Admin/Product/{$product->getId()}">查看</a>&nbsp;&nbsp;<a href="/Admin/Product/Save/{$product->getId()}">编辑</a>&nbsp;&nbsp;<a href="/Admin/Product/Delete/{$product->getId()}" class="del">删除</a>&nbsp;&nbsp;<a href="/Admin/Product/{$product->getId()}/Slides">轮播图</a></td>
		</tr>
		{/foreach}
		{/if}
	</table>
	<div class="pages">
	{include file="Admin/pages.tpl"}
	</div>
</div>	
{include file="Admin/footer.tpl"}