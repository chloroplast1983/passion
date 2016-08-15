{include file="Admin/header.tpl"}
<h3><em></em>商品幻灯片管理</h3>
<div class="submsg">
	<h5><a href="/Admin/Product?filter[status]=0">返回商品列表</a></h5>
	<form method="post" action="" enctype="multipart/form-data">
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>商品名称</th>
			<td>{$product->getTitle()}</td>
		</tr>
		<tr>
			<th>轮播图</th>
			<td><input type="file" name="slide" value="" class="txt"/></td>
		</tr>
	</table>
	<input type="submit" name="" value="提交" class="submit" style="margin-left:380px;"/>
	</form>	
</div>
{include file="Admin/footer.tpl"}