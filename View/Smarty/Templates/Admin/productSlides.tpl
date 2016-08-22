{include file="Admin/header.tpl"}
<h3><em></em>商品轮播图管理</h3>
	<div class="submsg">
	<h5><a href="/Admin/Product/{$product->getId()}/Slides/Save">添加轮播图</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>商品标题</th>
			<th>图片</th>
			<th>添加时间</th>
			<th>操作</th>
		</tr>
		{if $product->getSlides() neq ""}
		{foreach $product->getSlides() as $slide}
		<tr>
			<td>{$product->getTitle()}</td>
			<td><img src="{$slide->getFileURL()}" width="100" height="100"/></td>
			<td>{$slide->getFileTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
			<td><a href="/Admin/Product/{$product->getId()}/Slides/{$slide->getId()}/Delete" class="del">删除</a></td>
		</tr>
		{/foreach}
		{/if}
	</table>
	<div class="pages">
	</div>
</div>	
{include file="Admin/footer.tpl"}