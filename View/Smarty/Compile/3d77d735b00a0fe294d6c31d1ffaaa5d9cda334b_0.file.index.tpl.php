<?php
/* Smarty version 3.1.29, created on 2016-07-11 06:27:42
  from "/var/www/html/passion/View/Smarty/Templates/Admin/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57833c5ead8ce6_26738600',
  'file_dependency' => 
  array (
    '3d77d735b00a0fe294d6c31d1ffaaa5d9cda334b' => 
    array (
      0 => '/var/www/html/passion/View/Smarty/Templates/Admin/index.tpl',
      1 => 1468218459,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Admin/header.tpl' => 1,
    'file:Admin/footer.tpl' => 1,
  ),
),false)) {
function content_57833c5ead8ce6_26738600 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="mainbox">
    <div class="grids">
        <table border="0" cellspacing="0" cellpadding="0" class="msgtable indexTable">
            <tbody>
                <tr>
                    <th colspan="20">xxx</th>
                </tr>
                <tr>
                    <td width="100%">欢迎您登录xxx管理平台</td>
                </tr>
                
            </tbody>
        </table>
    </div>
    <div class="grids">
        <table border="0" cellspacing="0" cellpadding="0" class="msgtable indexTable">
            <tbody>
                <tr>
                    <th colspan="20">公司信息</th>
                </tr>
                <tr>
                    <td width="100%">PASSION</td>
                </tr>
                
            </tbody>
        </table>
    </div>
    <div class="grids">
        <table border="0" cellspacing="0" cellpadding="0" class="msgtable indexTable">
            <tbody>
                <tr>
                    <th colspan="20">系统信息</th>
                </tr>
                <tr>
                    <td width="30%" class="left">系统版本</td>
                    <td class="right">v1.2</td>
                </tr>
                <tr>
                    <td width="30%" class="left">操作系统</td>
                    <td class="right"><?php echo $_smarty_tpl->tpl_vars['_SERVER']->value['SERVER_SOFTWARE'];?>
</td>
                </tr>
                <tr>
                    <td class="left">编码</td>
                    <td class="right">UTF-8</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:Admin/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
