<?php
/* Smarty version 3.1.29, created on 2016-07-14 12:31:24
  from "/var/www/html/passion/View/Smarty/Templates/Admin/footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5787159c8edd10_96870065',
  'file_dependency' => 
  array (
    'f7d5f102b44545013c20cc4756188e43b068eff9' => 
    array (
      0 => '/var/www/html/passion/View/Smarty/Templates/Admin/footer.tpl',
      1 => 1468470898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5787159c8edd10_96870065 ($_smarty_tpl) {
?>
<div class="footer">版权所有 © 2016 - 2017 <a href="javascript:void(0)" target="_blank">passion 肥兔子</a>
<div class="togglemenu" style="right: 40px; top: 49px;" id="toggle">
	<ul style="display:none">
		<li><a href="#">询价列表</a></li>
		<li><a href="#">产品列表</a></li>
		<li><a href="#">新闻列表</a></li>
	</ul>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    jQuery(function ($) {
    	Common.init();
    })
<?php echo '</script'; ?>
>
</body>

</html><?php }
}
