<?php
/* Smarty version 3.1.29, created on 2016-07-14 19:27:47
  from "/var/www/html/passion/View/Smarty/Templates/Admin/newsSave.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57877733093f36_58095275',
  'file_dependency' => 
  array (
    '3f0886efaf88251815c6f600326a25776f865242' => 
    array (
      0 => '/var/www/html/passion/View/Smarty/Templates/Admin/newsSave.tpl',
      1 => 1468466527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/header.tpl' => 1,
    'file:Admin/footer.tpl' => 1,
  ),
),false)) {
function content_57877733093f36_58095275 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3><em></em>新闻管理</h3>
<div class="submsg">
	<h5><a href="/Admin/News">返回新闻列表</a></h5>
	<form method="post" action="" enctype="multipart/form-data">
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>标题</th>
			<td><input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['news']->value->getTitle();?>
" class="txt"/></td>
		</tr>
		<tr>
			<th>内容</th>
			<td>
			    <?php echo '<script'; ?>
 id="container" name="content" type="text/plain">
        			<?php echo html_entity_decode($_smarty_tpl->tpl_vars['news']->value->getContent());?>

    			<?php echo '</script'; ?>
>
    		</td>
		</tr>
	</table>
	<input type="hidden" name="newsId" value="<?php echo $_smarty_tpl->tpl_vars['news']->value->getId();?>
"/>
	<input type="submit" name="" value="提交" class="submit" style="margin-left:380px;"/>
	</form>	
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="/ueditor/ueditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/ueditor/ueditor.all.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    var ue = UE.getEditor('container');
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
