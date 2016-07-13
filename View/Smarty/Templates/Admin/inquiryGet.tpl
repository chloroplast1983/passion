{include file="Admin/header.tpl"}
<h3><em></em>询价管理</h3>
<div class="submsg">
	<h5><a href="/Admin/Inquiry">返回询价列表</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>询价标题</th>
			<td>{$inquiry->getTitle()}</td>
		</tr>
		<tr>
			<th>询价人</th>
			<td>{$inquiry->getEmail()}</td>
		</tr>
		<tr>
			<th>询价时间</th>
			<td>{$inquiry->getCreateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
		</tr>
		<tr>
			<th>询价内容</th>
			<td>{$inquiry->getContent()}</td>
		</tr>
	</table>
</div>
{include file="Admin/footer.tpl"}