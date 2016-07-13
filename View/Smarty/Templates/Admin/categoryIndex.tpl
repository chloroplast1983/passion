{include file="Admin/header.tpl"}
<h3><em></em>分类管理</h3>
	<div class="submsg">
	<h5><a href="#">添加分类</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>分类名称</th>
			<th>添加时间</th>
			<th>分类类型</th>
		</tr>
		{if $categoryList neq ""}
		{foreach $categoryList as $category}
		<tr>
			<td>{$category->getName()}</td>
			<td>{$category->getCreateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
			<td></td>
			<td><a href="/Admin/Category/{$category->getId()}">查看</a>&nbsp;&nbsp;<a href="/Admin/Brand/Category/{$category->getId()}">编辑</a>&nbsp;&nbsp;<a href="/Admin/Category/Delete/{$category->getId()}">删除</a></td>
		</tr>
		{/foreach}
		{/if}
	</table>
</div>	
{include file="Admin/footer.tpl"}