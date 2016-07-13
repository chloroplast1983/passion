<?php
/* Smarty version 3.1.29, created on 2016-07-12 15:53:49
  from "/var/www/html/passion/View/Smarty/Templates/Admin/brandGet.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5784a20d0573d4_94346422',
  'file_dependency' => 
  array (
    'acd95374e26855f27bde5b367eed731e2d5dfc05' => 
    array (
      0 => '/var/www/html/passion/View/Smarty/Templates/Admin/brandGet.tpl',
      1 => 1468249005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/header.tpl' => 1,
    'file:Admin/footer.tpl' => 1,
  ),
),false)) {
function content_5784a20d0573d4_94346422 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/passion/vendor/smarty/smarty/libs/plugins/modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3><em></em>品牌管理</h3>
<div class="submsg">
	<h5><a href="/Admin/Brand">返回品牌列表</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>品牌名称</th>
			<td><?php echo $_smarty_tpl->tpl_vars['brand']->value->getName();?>
</td>
		</tr>
		<tr>
			<th>logo</th>
			<td>logo</td>
		</tr>
		<tr>
			<th>添加时间</th>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['brand']->value->getCreateTime(),"%Y-%m-%d %H:%M:%S");?>
</td>
		</tr>
		<tr>
			<th>更新时间</th>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['brand']->value->getUpdateTime(),"%Y-%m-%d %H:%M:%S");?>
</td>
		</tr>
	</table>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
