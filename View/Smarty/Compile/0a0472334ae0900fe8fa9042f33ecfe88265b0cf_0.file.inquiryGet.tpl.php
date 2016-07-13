<?php
/* Smarty version 3.1.29, created on 2016-07-12 16:07:25
  from "/var/www/html/passion/View/Smarty/Templates/Admin/inquiryGet.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5784a53d185876_32058934',
  'file_dependency' => 
  array (
    '0a0472334ae0900fe8fa9042f33ecfe88265b0cf' => 
    array (
      0 => '/var/www/html/passion/View/Smarty/Templates/Admin/inquiryGet.tpl',
      1 => 1468310840,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/header.tpl' => 1,
    'file:Admin/footer.tpl' => 1,
  ),
),false)) {
function content_5784a53d185876_32058934 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/passion/vendor/smarty/smarty/libs/plugins/modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3><em></em>询价管理</h3>
<div class="submsg">
	<h5><a href="/Admin/Inquiry">返回询价列表</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>询价标题</th>
			<td><?php echo $_smarty_tpl->tpl_vars['inquiry']->value->getTitle();?>
</td>
		</tr>
		<tr>
			<th>询价人</th>
			<td><?php echo $_smarty_tpl->tpl_vars['inquiry']->value->getEmail();?>
</td>
		</tr>
		<tr>
			<th>询价时间</th>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['inquiry']->value->getCreateTime(),"%Y-%m-%d %H:%M:%S");?>
</td>
		</tr>
		<tr>
			<th>询价内容</th>
			<td><?php echo $_smarty_tpl->tpl_vars['inquiry']->value->getContent();?>
</td>
		</tr>
	</table>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
