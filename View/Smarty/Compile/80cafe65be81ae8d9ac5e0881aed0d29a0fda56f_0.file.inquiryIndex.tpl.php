<?php
/* Smarty version 3.1.29, created on 2016-07-12 16:02:25
  from "/var/www/html/passion/View/Smarty/Templates/Admin/inquiryIndex.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5784a41166b1d5_83419438',
  'file_dependency' => 
  array (
    '80cafe65be81ae8d9ac5e0881aed0d29a0fda56f' => 
    array (
      0 => '/var/www/html/passion/View/Smarty/Templates/Admin/inquiryIndex.tpl',
      1 => 1468249499,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/header.tpl' => 1,
    'file:Admin/footer.tpl' => 1,
  ),
),false)) {
function content_5784a41166b1d5_83419438 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/passion/vendor/smarty/smarty/libs/plugins/modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3><em></em>询价管理</h3>
	<div class="submsg">
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>询价标题</th>
			<th>询价人</th>
			<th>询价时间</th>
			<th>操作</th>
		</tr>
		<?php if ($_smarty_tpl->tpl_vars['inquiryList']->value != '') {?>
		<?php
$_from = $_smarty_tpl->tpl_vars['inquiryList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_inquiry_0_saved_item = isset($_smarty_tpl->tpl_vars['inquiry']) ? $_smarty_tpl->tpl_vars['inquiry'] : false;
$_smarty_tpl->tpl_vars['inquiry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['inquiry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['inquiry']->value) {
$_smarty_tpl->tpl_vars['inquiry']->_loop = true;
$__foreach_inquiry_0_saved_local_item = $_smarty_tpl->tpl_vars['inquiry'];
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['inquiry']->value->getTitle();?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['inquiry']->value->getEmail();?>
</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['inquiry']->value->getCreateTime(),"%Y-%m-%d %H:%M:%S");?>
</td>
			<td><a href="/Admin/Inquiry/<?php echo $_smarty_tpl->tpl_vars['inquiry']->value->getId();?>
">查看</a>&nbsp;&nbsp;<a href="/Admin/Inquiry/Delete/<?php echo $_smarty_tpl->tpl_vars['inquiry']->value->getId();?>
">删除</a></td>
		</tr>
		<?php
$_smarty_tpl->tpl_vars['inquiry'] = $__foreach_inquiry_0_saved_local_item;
}
if ($__foreach_inquiry_0_saved_item) {
$_smarty_tpl->tpl_vars['inquiry'] = $__foreach_inquiry_0_saved_item;
}
?>
		<?php }?>
	</table>
	<div class="pages">
	</div>
</div>	
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
