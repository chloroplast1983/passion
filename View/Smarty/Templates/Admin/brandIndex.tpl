{include file="Admin/header.tpl"}
<h3><em></em>品牌管理</h3>
	<div class="submsg">
	<h5><a href="/Admin/Brand/Save">添加品牌</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>品牌名称</th>
			<th>添加时间</th>
			<th>更新时间</th>
			<th>操作</th>
		</tr>
		{if $brandList neq ""}
		{foreach $brandList as $brand}
		<tr>
			<td>{$brand->getName()}</td>
			<td>{$brand->getCreateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
			<td>{$brand->getUpdateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
			<td><a href="/Admin/Brand/{$brand->getId()}">查看</a>&nbsp;&nbsp;<a href="/Admin/Brand/Save/{$brand->getId()}">编辑</a>&nbsp;&nbsp;<a href="/Admin/Brand/Delete/{$brand->getId()}" class="del">删除</a></td>
		</tr>
		{/foreach}
		{/if}
	</table>
	<div class="pages">
	{include file="Admin/pages.tpl"}
	</div>
</div>	
{include file="Admin/footer.tpl"}