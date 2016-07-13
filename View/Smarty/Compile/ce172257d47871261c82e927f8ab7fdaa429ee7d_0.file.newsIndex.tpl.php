<?php
/* Smarty version 3.1.29, created on 2016-07-11 19:36:59
  from "/var/www/html/passion/View/Smarty/Templates/Admin/newsIndex.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578384db0e28f9_23871836',
  'file_dependency' => 
  array (
    'ce172257d47871261c82e927f8ab7fdaa429ee7d' => 
    array (
      0 => '/var/www/html/passion/View/Smarty/Templates/Admin/newsIndex.tpl',
      1 => 1468237752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/header.tpl' => 1,
    'file:Admin/footer.tpl' => 1,
  ),
),false)) {
function content_578384db0e28f9_23871836 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/passion/vendor/smarty/smarty/libs/plugins/modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3><em></em>新闻管理</h3>
	<div class="submsg">
	<h5><a href="/Admin/News/Save">添加新闻</a></h5>
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>新闻标题</th>
			<th>添加时间</th>
			<th>更新时间</th>
			<th>操作</th>
		</tr>
		<?php if ($_smarty_tpl->tpl_vars['newsList']->value != '') {?>
		<?php
$_from = $_smarty_tpl->tpl_vars['newsList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_news_0_saved_item = isset($_smarty_tpl->tpl_vars['news']) ? $_smarty_tpl->tpl_vars['news'] : false;
$_smarty_tpl->tpl_vars['news'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['news']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
$__foreach_news_0_saved_local_item = $_smarty_tpl->tpl_vars['news'];
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['news']->value->getTitle();?>
</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news']->value->getCreateTime(),"%Y-%m-%d %H:%M:%S");?>
</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news']->value->getUpdateTime(),"%Y-%m-%d %H:%M:%S");?>
</td>
			<td><a href="/Admin/News/<?php echo $_smarty_tpl->tpl_vars['news']->value->getId();?>
">查看</a>&nbsp;&nbsp;<a href="/Admin/News/Save/<?php echo $_smarty_tpl->tpl_vars['news']->value->getId();?>
">编辑</a>&nbsp;&nbsp;<a href="/Admin/News/Delete/<?php echo $_smarty_tpl->tpl_vars['news']->value->getId();?>
">删除</a></td>
		</tr>
		<?php
$_smarty_tpl->tpl_vars['news'] = $__foreach_news_0_saved_local_item;
}
if ($__foreach_news_0_saved_item) {
$_smarty_tpl->tpl_vars['news'] = $__foreach_news_0_saved_item;
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
