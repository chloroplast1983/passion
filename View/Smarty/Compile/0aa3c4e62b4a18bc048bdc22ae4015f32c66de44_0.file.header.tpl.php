<?php
/* Smarty version 3.1.29, created on 2016-07-14 11:59:46
  from "/var/www/html/passion/View/Smarty/Templates/Admin/header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57870e32845238_48852184',
  'file_dependency' => 
  array (
    '0aa3c4e62b4a18bc048bdc22ae4015f32c66de44' => 
    array (
      0 => '/var/www/html/passion/View/Smarty/Templates/Admin/header.tpl',
      1 => 1468468986,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57870e32845238_48852184 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PHPcore 后台管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/Global/Style/Admin/admincp.css" type="text/css" media="all" />
<link rel="stylesheet" href="/Global/Style/Admin/adminPage.css" type="text/css" media="all" />
<?php echo '<script'; ?>
 type="text/javascript" src="/Global/Style/Admin/Script/jquery-3.0.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/Global/Style/Admin/Script/admin-common.js"><?php echo '</script'; ?>
>
<meta content="PHPcore Inc." name="Copyright" />
</head>
<body>
<div class="header"><a class="logo" href="#" title="PHPcore">PHPcore</a>
<div class="uinfo"><p id="others"><a href="javascript:void(0)" class="othersoff">快速导航</a></p></div></div><div class="wrap" id="wrap"><div class="side" style="height: 400px;">

<a class="sideul newsSideBar" href="#" id="menu2"><em class="shrink">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em>新闻</a>
	<div class="subinfo newsSideBar" id="menu3" <?php if (!$_smarty_tpl->tpl_vars['newsSideBar']->value) {?> style="display:none" <?php }?>>
		<a href="/Admin/News" class ="<?php if ($_smarty_tpl->tpl_vars['newsListRef']->value) {?> tabon <?php }?>">新闻管理</a>
		<a href="/Admin/News/Save" class ="<?php if ($_smarty_tpl->tpl_vars['newsSaveRef']->value) {?> tabon <?php }?>">添加新闻</a>
	</div>
<a class="sideul inquirySideBar" href="#" id="menu2"><em class="shrink">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em>询价</a>
	<div class="subinfo inquirySideBar" id="menu3" <?php if (!$_smarty_tpl->tpl_vars['inquirySideBar']->value) {?> style="display:none" <?php }?>>
		<a href="/Admin/Inquiry" class ="<?php if ($_smarty_tpl->tpl_vars['inquiryListRef']->value) {?> tabon <?php }?>">询价管理</a>
	</div>

<a class="sideul productSideBar" href="#" id="menu2"><em class="shrink">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em>产品</a>
	<div class="subinfo productSideBar" id="menu3" <?php if (!$_smarty_tpl->tpl_vars['productSideBar']->value) {?> style="display:none" <?php }?>>
		<a href="/Admin/Product" class ="<?php if ($_smarty_tpl->tpl_vars['productListRef']->value) {?> tabon <?php }?>">产品管理</a>
		<a href="/Admin/Product/Save" class ="<?php if ($_smarty_tpl->tpl_vars['producSaveRef']->value) {?> tabon <?php }?>">添加产品</a>
		<a href="/Admin/Brand" class ="<?php if ($_smarty_tpl->tpl_vars['brandListRef']->value) {?> tabon <?php }?>">品牌管理</a>
		<a href="/Admin/Category" class ="<?php if ($_smarty_tpl->tpl_vars['categoryListRef']->value) {?> tabon <?php }?>">分类管理</a>
	</div>

</div>
<div class="mainbox">

<?php }
}
