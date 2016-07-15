{include file="Admin/header.tpl"}
<h3><em></em>分类管理</h3>
	<div class="submsg">
<!-- 	<h4>{if $type eq 1}扶梯分类{else}<a href="/Admin/Category?filter[type]=1">扶梯分类</a>{/if}&nbsp;&nbsp;{if $type eq 2}直梯分类{else}<a href="/Admin/Category?filter[type]=2">直梯分类</a>{/if}</h4> -->
	<h5><a href="/Admin/Category/Save">添加分类</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>分类名称</th>
			<th>添加时间</th>
			<th>更新时间</th>
			<th>分类类型</th>
			<th>上级分类</th>
			<th>操作</th>
		</tr>
		{if $categoryList neq ""}
		{foreach $categoryList as $category}
		<tr>
			<td>{$category->getName()}</td>
			<td>{$category->getCreateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
			<td>{$category->getUpdateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
			<td>{if $category->getType() eq 1}扶梯{else}直梯{/if}</td>
			<td>{if $category->getParentId() > 0}
					{assign var=parentCategory value=current($parentCategoryList)}
					{$parentCategory->getName()}
					{assign var=parentCategory value=next($parentCategoryList)}
				{else}
					无
				{/if}
			</td>
			<td><a href="/Admin/Category/Save/{$category->getId()}">编辑</a>&nbsp;&nbsp;<a href="/Admin/Category/Delete/{$category->getId()}" class="del">删除</a></td>
		</tr>
		{/foreach}
		{/if}
	</table>
</div>	
{include file="Admin/footer.tpl"}