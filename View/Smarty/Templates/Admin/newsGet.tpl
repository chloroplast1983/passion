{include file="Admin/header.tpl"}
<h3><em></em>新闻管理</h3>
<div class="submsg">
	<h5><a href="/Admin/News">返回新闻列表</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>标题</th>
			<td>{$news->getTitle()}</td>
		</tr>
		<tr>
			<th>添加时间</th>
			<td>{$news->getCreateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
		</tr>
		<tr>
			<th>更新时间</th>
			<td>{$news->getUpdateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
		</tr>
		<tr>
			<th>内容</th>
			<td>{html_entity_decode($news->getContent())}</td>
		</tr>
	</table>
</div>
{include file="Admin/footer.tpl"}