{include file="Admin/header.tpl"}
<h3><em></em>新闻管理</h3>
	<div class="submsg">
	<h5><a href="/Admin/News/Save">添加新闻</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>新闻标题</th>
			<th>添加时间</th>
			<th>更新时间</th>
			<th>操作</th>
		</tr>
		{if $newsList neq ""}
		{foreach $newsList as $news}
		<tr>
			<td>{$news->getTitle()}</td>
			<td>{$news->getCreateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
			<td>{$news->getUpdateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
			<td><a href="/Admin/News/{$news->getId()}">查看</a>&nbsp;&nbsp;<a href="/Admin/News/Save/{$news->getId()}">编辑</a>&nbsp;&nbsp;<a href="/Admin/News/Delete/{$news->getId()}" class="del">删除</a></td>
		</tr>
		{/foreach}
		{/if}
	</table>
	<div class="pages">
	{include file="Admin/pages.tpl"}
	</div>
</div>	
{include file="Admin/footer.tpl"}