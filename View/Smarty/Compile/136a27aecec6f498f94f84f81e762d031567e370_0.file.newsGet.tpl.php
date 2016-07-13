<?php
/* Smarty version 3.1.29, created on 2016-07-13 10:49:05
  from "/var/www/html/passion/View/Smarty/Templates/Admin/newsGet.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5785ac213d0ab0_98772784',
  'file_dependency' => 
  array (
    '136a27aecec6f498f94f84f81e762d031567e370' => 
    array (
      0 => '/var/www/html/passion/View/Smarty/Templates/Admin/newsGet.tpl',
      1 => 1468378142,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/header.tpl' => 1,
    'file:Admin/footer.tpl' => 1,
  ),
),false)) {
function content_5785ac213d0ab0_98772784 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/passion/vendor/smarty/smarty/libs/plugins/modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3><em></em>新闻管理</h3>
<div class="submsg">
	<h5><a href="/Admin/News">返回新闻列表</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>标题</th>
			<td><?php echo $_smarty_tpl->tpl_vars['news']->value->getTitle();?>
</td>
		</tr>
		<tr>
			<th>添加时间</th>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news']->value->getCreateTime(),"%Y-%m-%d %H:%M:%S");?>
</td>
		</tr>
		<tr>
			<th>更新时间</th>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news']->value->getUpdateTime(),"%Y-%m-%d %H:%M:%S");?>
</td>
		</tr>
		<tr>
			<th>内容</th>
			<td><?php echo html_entity_decode($_smarty_tpl->tpl_vars['news']->value->getContent());?>
</td>
		</tr>
	</table>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
