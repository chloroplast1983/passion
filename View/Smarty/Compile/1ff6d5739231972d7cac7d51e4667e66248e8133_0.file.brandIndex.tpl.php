<?php
/* Smarty version 3.1.29, created on 2016-07-12 17:35:08
  from "/var/www/html/passion/View/Smarty/Templates/Admin/brandIndex.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5784b9ccc06e72_23878917',
  'file_dependency' => 
  array (
    '1ff6d5739231972d7cac7d51e4667e66248e8133' => 
    array (
      0 => '/var/www/html/passion/View/Smarty/Templates/Admin/brandIndex.tpl',
      1 => 1468311459,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/header.tpl' => 1,
    'file:Admin/footer.tpl' => 1,
  ),
),false)) {
function content_5784b9ccc06e72_23878917 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/passion/vendor/smarty/smarty/libs/plugins/modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3><em></em>品牌管理</h3>
	<div class="submsg">
	<h5><a href="/Admin/Brand/Save">添加品牌</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>品牌名称</th>
			<th>logo</th>
			<th>添加时间</th>
			<th>更新时间</th>
			<th>操作</th>
		</tr>
		<?php if ($_smarty_tpl->tpl_vars['brandList']->value != '') {?>
		<?php
$_from = $_smarty_tpl->tpl_vars['brandList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_brand_0_saved_item = isset($_smarty_tpl->tpl_vars['brand']) ? $_smarty_tpl->tpl_vars['brand'] : false;
$_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['brand']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
$__foreach_brand_0_saved_local_item = $_smarty_tpl->tpl_vars['brand'];
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['brand']->value->getName();?>
</td>
			<td>logo</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['brand']->value->getCreateTime(),"%Y-%m-%d %H:%M:%S");?>
</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['brand']->value->getUpdateTime(),"%Y-%m-%d %H:%M:%S");?>
</td>
			<td><a href="/Admin/Brand/<?php echo $_smarty_tpl->tpl_vars['brand']->value->getId();?>
">查看</a>&nbsp;&nbsp;<a href="/Admin/Brand/Save/<?php echo $_smarty_tpl->tpl_vars['brand']->value->getId();?>
">编辑</a>&nbsp;&nbsp;<a href="/Admin/Brand/Delete/<?php echo $_smarty_tpl->tpl_vars['brand']->value->getId();?>
">删除</a></td>
		</tr>
		<?php
$_smarty_tpl->tpl_vars['brand'] = $__foreach_brand_0_saved_local_item;
}
if ($__foreach_brand_0_saved_item) {
$_smarty_tpl->tpl_vars['brand'] = $__foreach_brand_0_saved_item;
}
?>
		<?php }?>
	</table>
</div>	
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
