<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PASSION 后台管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/Global/Style/Admin/admincp.css" type="text/css" media="all" />
<link rel="stylesheet" href="/Global/Style/Admin/adminPage.css" type="text/css" media="all" />
<script type="text/javascript" src="/Global/Style/Admin/Script/jquery-3.0.0.min.js"></script>
<script type="text/javascript" src="/Global/Style/Admin/Script/admin-common.js"></script>
<meta content="PHPcore Inc." name="Copyright" />
</head>
<body>
<div class="header"><a class="logo" href="#" title="PHPcore">PHPcore</a>
<div class="uinfo"><p id="others"><a href="javascript:void(0)" class="othersoff">快速导航</a></p></div></div><div class="wrap" id="wrap"><div class="side" style="height: 400px;">

<a class="sideul productSideBar" href="#" id="menu2"><em class="shrink">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em>产品</a>
	<div class="subinfo productSideBar" id="menu3" {if !$productSideBar} style="display:none" {/if}>
		<a href="/Admin/Product?filter[status]=0" class ="{if $productListRef} tabon {/if}">产品管理</a>
		<a href="/Admin/Product/Save" class ="{if $producSaveRef} tabon {/if}">添加产品</a>
		<a href="/Admin/Brand?filter[status]=0" class ="{if $brandListRef} tabon {/if}">品牌管理</a>
		<a href="/Admin/Category?filter[status]=0" class ="{if $categoryListRef} tabon {/if}">分类管理</a>
	</div>

<a class="sideul inquirySideBar" href="#" id="menu2"><em class="shrink">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em>询价</a>
	<div class="subinfo inquirySideBar" id="menu3" {if !$inquirySideBar} style="display:none" {/if}>
		<a href="/Admin/Inquiry" class ="{if $inquiryListRef} tabon {/if}">询价管理</a>
	</div>

<a class="sideul newsSideBar" href="#" id="menu2"><em class="shrink">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em>新闻</a>
	<div class="subinfo newsSideBar" id="menu3" {if !$newsSideBar} style="display:none" {/if}>
		<a href="/Admin/News?filter[status]=0" class ="{if $newsListRef} tabon {/if}">新闻管理</a>
		<a href="/Admin/News/Save" class ="{if $newsSaveRef} tabon {/if}">添加新闻</a>
	</div>
	
</div>
<div class="mainbox">

