{include file="Admin/header.tpl"}
<h3><em></em>询价管理</h3>
	<div class="submsg">
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>询价人</th>
			<th>询价人邮件</th>
			<th>询价时间</th>
			<th>询价人IP</th>
			<th>操作</th>
		</tr>
		{if $inquiryList neq ""}
		{foreach $inquiryList as $inquiry}
		<tr>
			<td>{$inquiry->getName()}</td>
			<td>{$inquiry->getEmail()}</td>
			<td>{$inquiry->getCreateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
			<td>{$inquiry->getClientIp()}</td>
			<td><a href="/Admin/Inquiry/{$inquiry->getId()}">查看</a>&nbsp;&nbsp;<a href="/Admin/Inquiry/Delete/{$inquiry->getId()}">删除</a></td>
		</tr>
		{/foreach}
		{/if}
	</table>
	<div class="pages">
	{include file="Admin/pages.tpl"}
	</div>
</div>	
{include file="Admin/footer.tpl"}