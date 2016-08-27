{include file="Admin/header.tpl"}
<div class="grids">
    <table border="0" cellspacing="0" cellpadding="0" class="msgtable indexTable">
        <tbody>
            <tr>
                <th colspan="20">欢迎您登陆PASSION ELEVATOR网站管理后台</th>
            </tr>
            <tr>
                <td width="100%">
                    <ul class="shortcut_menu cl">
                        <li>
                            <a href="/Admin/Inquiry">
                                <img src="./Global/Style/Admin/Images/admin_icon1.png">
                                <span>询价管理</span>
                            </a>
                        </li>
                        <li>
                            <a href="/Admin/Product/Save">
                                <img src="./Global/Style/Admin/Images/admin_icon2.png">
                                <span>添加产品</span>
                            </a>
                        </li>
                        <li>
                            <a href="/Admin/Product?filter[status]=0">
                                <img src="./Global/Style/Admin/Images/admin_icon3.png">
                                <span>产品管理</span>
                            </a>
                        </li>
                        <li>
                            <a href="/Admin/Category?filter[status]=0">
                                <img src="./Global/Style/Admin/Images/admin_icon4.png">
                                <span>分类管理</span>
                            </a>
                        </li>
                        <li>
                            <a href="/Admin/Brand?filter[status]=0">
                                <img src="./Global/Style/Admin/Images/admin_icon5.png">
                                <span>品牌管理</span>
                            </a>
                        </li>
                        <li>
                            <a href="/Admin/News/Save">
                                <img src="./Global/Style/Admin/Images/admin_icon6.png">
                                <span>添加新闻</span>
                            </a>
                        </li>
                        {*<li>
                            <a href="javascript:;">
                                <img src="./Global/Style/Admin/Images/admin_icon7.png">
                                <span>管理员管理</span>
                            </a>
                        </li>*}
                    </ul>
                </td>
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
                <td class="right">{$_SERVER['SERVER_SOFTWARE']}</td>
            </tr>
            <tr>
                <td class="left">编码</td>
                <td class="right">UTF-8</td>
            </tr>
        </tbody>
    </table>
</div>
{include file="Admin/footer.tpl"}