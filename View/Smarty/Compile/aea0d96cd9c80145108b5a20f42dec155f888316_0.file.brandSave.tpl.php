<?php
/* Smarty version 3.1.29, created on 2016-07-15 14:37:25
  from "/var/www/html/passion/View/Smarty/Templates/Admin/brandSave.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578884a5ece5d1_17293490',
  'file_dependency' => 
  array (
    'aea0d96cd9c80145108b5a20f42dec155f888316' => 
    array (
      0 => '/var/www/html/passion/View/Smarty/Templates/Admin/brandSave.tpl',
      1 => 1468564642,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/header.tpl' => 1,
    'file:Admin/footer.tpl' => 1,
  ),
),false)) {
function content_578884a5ece5d1_17293490 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3><em></em>品牌管理</h3>
<div class="submsg">
	<h5><a href="/Admin/Brand">返回品牌列表</a></h5>
	<form method="post" action="" enctype="multipart/form-data">
	<table border="0" cellspacing="0" cellpadding="0" class="msgtable">
		<tr>
			<th>品牌名称</th>
			<td><input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['brand']->value->getName();?>
" class="txt"/></td>
		</tr>
		<?php if ($_smarty_tpl->tpl_vars['brand']->value->getLogo()->getId() != 0) {?>
		<tr>
			<th>logo</th>
			<td><?php echo $_smarty_tpl->tpl_vars['brand']->value->getLogo()->getId();?>
</td>
		</tr>
		<tr>
			<th>编辑上传logo</th>
			<td><input type="file" name="logo" value="" class="txt"/></td>
		</tr>
		<?php } else { ?>
		<tr>
			<th>logo</th>
			<td><input type="file" name="logo" value="" class="txt"/></td>
		</tr>
		<?php }?>
	</table>
	<input type="hidden" name="brandId" value="<?php echo $_smarty_tpl->tpl_vars['brand']->value->getId();?>
"/>
	<input type="submit" name="" value="提交" class="submit" style="margin-left:380px;"/>
	</form>	
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
