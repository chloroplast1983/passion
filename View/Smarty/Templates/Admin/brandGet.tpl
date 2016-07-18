{include file="Admin/header.tpl"}
<h3><em></em>品牌管理</h3>
<div class="submsg">
	<h5><a href="/Admin/Brand">返回品牌列表</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>品牌名称</th>
			<td>{$brand->getName()}</td>
		</tr>
		<tr>
			<th>logo</th>
			<td>
			{if $brand->getLogo()->getId() > 0}
			<img src="{$brand->getLogo()->getFileURL()}"/>
			{else}
			无
			{/if}
			</td>
		</tr>
		<tr>
			<th>添加时间</th>
			<td>{$brand->getCreateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
		</tr>
		<tr>
			<th>更新时间</th>
			<td>{$brand->getUpdateTime()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
		</tr>
	</table>
</div>
{include file="Admin/footer.tpl"}