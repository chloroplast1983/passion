{include file="Admin/header.tpl"}
<h3><em></em>新闻管理</h3>
<div class="submsg">
	<h5><a href="/Admin/News">返回新闻列表</a></h5>
	<form method="post" action="" enctype="multipart/form-data">
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>标题</th>
			<td><input type="text" name="title" value="{$news->getTitle()}" class="txt"/></td>
		</tr>
		<tr>
			<th>内容</th>
			<td>
			    <script id="container" name="content" type="text/plain">
        			{html_entity_decode($news->getContent())}
    			</script>
    		</td>
		</tr>
	</table>
	<input type="hidden" name="newsId" value="{$news->getId()}"/>
	<input type="submit" name="" value="提交" class="submit" style="margin-left:380px;"/>
	</form>	
</div>
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>
{include file="Admin/footer.tpl"}