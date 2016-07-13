<?php
/* Smarty version 3.1.29, created on 2016-07-11 19:24:50
  from "/var/www/html/passion/View/Smarty/Templates/Admin/message.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578382028dd551_44252478',
  'file_dependency' => 
  array (
    '4837852553bfe871dc96e1672954fb8701b29a5f' => 
    array (
      0 => '/var/www/html/passion/View/Smarty/Templates/Admin/message.tpl',
      1 => 1468236990,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/header.tpl' => 1,
    'file:Admin/footer.tpl' => 1,
  ),
),false)) {
function content_578382028dd551_44252478 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3>系统消息</h3>
<div class="submsg prompt">
	<h5><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h5>
	<h6><?php if ($_smarty_tpl->tpl_vars['urlForward']->value != '') {?><a href="<?php echo $_smarty_tpl->tpl_vars['urlForward']->value;?>
" style="font-weight:800;">确定</a><?php }?>
	<a href="javascript:history.back();" style="font-weight:800;">返回上一页</a>
	<a href="/Admin" style="font-weight:800;">返回首页</a></h6>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
