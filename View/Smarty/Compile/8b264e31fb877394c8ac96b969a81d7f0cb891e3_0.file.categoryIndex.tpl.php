<?php
/* Smarty version 3.1.29, created on 2016-07-12 23:25:29
  from "/var/www/html/passion/View/Smarty/Templates/Admin/categoryIndex.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57850be97dc5c1_17525186',
  'file_dependency' => 
  array (
    '8b264e31fb877394c8ac96b969a81d7f0cb891e3' => 
    array (
      0 => '/var/www/html/passion/View/Smarty/Templates/Admin/categoryIndex.tpl',
      1 => 1468337127,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/header.tpl' => 1,
    'file:Admin/footer.tpl' => 1,
  ),
),false)) {
function content_57850be97dc5c1_17525186 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/passion/vendor/smarty/smarty/libs/plugins/modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3><em></em>分类管理</h3>
	<div class="submsg">
	<h5><a href="#">添加分类</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>分类名称</th>
			<th>添加时间</th>
			<th>分类类型</th>
		</tr>
		<?php if ($_smarty_tpl->tpl_vars['categoryList']->value != '') {?>
		<?php
$_from = $_smarty_tpl->tpl_vars['categoryList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_category_0_saved_item = isset($_smarty_tpl->tpl_vars['category']) ? $_smarty_tpl->tpl_vars['category'] : false;
$_smarty_tpl->tpl_vars['category'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['category']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
$__foreach_category_0_saved_local_item = $_smarty_tpl->tpl_vars['category'];
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['category']->value->getCreateTime(),"%Y-%m-%d %H:%M:%S");?>
</td>
			<td></td>
			<td><a href="/Admin/Category/<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
">查看</a>&nbsp;&nbsp;<a href="/Admin/Brand/Category/<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
">编辑</a>&nbsp;&nbsp;<a href="/Admin/Category/Delete/<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
">删除</a></td>
		</tr>
		<?php
$_smarty_tpl->tpl_vars['category'] = $__foreach_category_0_saved_local_item;
}
if ($__foreach_category_0_saved_item) {
$_smarty_tpl->tpl_vars['category'] = $__foreach_category_0_saved_item;
}
?>
		<?php }?>
	</table>
</div>	
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
