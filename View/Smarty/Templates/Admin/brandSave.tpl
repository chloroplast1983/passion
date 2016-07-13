{include file="Admin/header.tpl"}
<h3><em></em>品牌管理</h3>
<div class="submsg">
	<h5><a href="/Admin/Brand">返回品牌列表</a></h5>
	<form method="post" action="" enctype="multipart/form-data">
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>品牌名称</th>
			<td><input type="text" name="name" value="{$brand->getName()}" class="txt"/></td>
		</tr>
		<tr>
			<th>logo</th>
			<td>logo</td>
		</tr>
	</table>
	<input type="hidden" name="brandId" value="{$brand->getId()}"/>
	<input type="submit" name="" value="提交" class="submit" style="margin-left:380px;"/>
	</form>	
</div>
{include file="Admin/footer.tpl"}