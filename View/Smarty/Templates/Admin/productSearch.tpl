{include file="Admin/header.tpl"}
<h3><em></em>产品搜索</h3>
<div class="submsg">
	<h5><a href="/Admin/Product?filter[status]=0">返回产品列表</a></h5>
	<form method="get" action="/Admin/Product" enctype="multipart/form-data">
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>标题</th>
			<td><input type="text" name="filter[keyword]" value="" class="txt"/></td>
		</tr>
		<tr>
			<th>品牌</th>
			<td>
				<select name="filter[brand]" class="select">
					<option value="0" selected="selected">-----</option>
					{foreach $brandList as $brand}
					<option value="{$brand->getId()}">{$brand->getName()}</option>
					{/foreach}
				</select>
			</td>
		</tr>
		<tr>
			<th>分类</th>
			<td>
				<select name="filter[type]" class="select categoryType">
					<option value="0">-----</option>
					<option value="1">扶梯</option>
					<option value="2">直梯</option>
				</select>
			</td>
		</tr>
	</table>
	<input type="hidden" name="filter[status]" value="0">
	<input type="submit" name="" value="搜索" class="submit" style="margin-left:380px;"/>
	</form>	
</div>
<script type="text/javascript" src="/Global/Style/Admin/Script/admin-category.js"></script>
{include file="Admin/footer.tpl"}