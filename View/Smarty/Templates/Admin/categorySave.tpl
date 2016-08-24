{include file="Admin/header.tpl"}
<h3><em></em>分类管理</h3>
<div class="submsg">
	<h5><a href="/Admin/Category?filter[status]=0">返回分类列表</a></h5>
	<form method="post" action="" enctype="multipart/form-data">
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>分类名称</th>
			<td><input type="text" name="name" value="{$category->getName()}" class="txt"/></td>
		</tr>
		<tr>
			<th>分类类型</th>
			<td>
				<div class="cl inline-select">
					<select name="type" class="select categoryType">
						<option value="1" {if $category->getType() eq 1}selected="selected"{/if}>扶梯</option>
						<option value="2" {if $category->getType() eq 2}selected="selected"{/if}>直梯</option>
					</select>
					&nbsp;
					<select name="parentId" class="select parentCategory">
						<option value="0">-----</option>
					</select>
				</div>
			</td>
		</tr>
		<tr>
			<th>关键词</th>
			<td><input type="text" name="seoKeyWord" value="{$category->getSeoKeyWord()}" class="txt"/></td>
		</tr>
		<tr>
			<th>标题</th>
			<td><input type="text" name="seoTitle" value="{$category->getSeoTitle()}" class="txt"/></td>
		</tr>
		<tr>
			<th>描述</th>
			<td>
			<textarea name="seoDescription">{$category->getSeoDescription()}</textarea>
			</td>
		</tr>
	</table>
	<input type="hidden" name="categoryId" value="{$category->getId()}"/>
	<input type="submit" name="" value="提交" class="submit" style="margin-left:380px;"/>
	</form>	
</div>
<script type="text/javascript" src="/Global/Style/Admin/Script/admin-category.js"></script>
<script type="text/javascript">
jQuery(function ($) {
	Category.init();
	Category.selectedCategory = {$category->getParentId()}
})
</script>
{include file="Admin/footer.tpl"}