{include file="Admin/header.tpl"}
<h3><em></em>商品管理</h3>
	<div class="submsg">
	<h5><a href="/Admin/Product/Save">添加新闻</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>商品标题</th>
			<th>编号</th>
			<th>商品分类</th>
			<th>商品类型</th>
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
			<td>xxx</td>
			<td>xxx</td>
			<td>xxxx</td>
			<td>{$product->getCreateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
			<td>{$product->getUpdateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
			<td><a href="/Admin/Product/{$product->getId()}">查看</a>&nbsp;&nbsp;<a href="/Admin/Product/Save/{$product->getId()}">编辑</a>&nbsp;&nbsp;<a href="/Admin/Product/Delete/{$product->getId()}">删除</a></td>
		</tr>
		{/foreach}
		{/if}
	</table>
	<div class="pages">
	</div>
</div>	
{include file="Admin/footer.tpl"}