{include file="Admin/header.tpl"}
<h3>系统消息</h3>
<div class="submsg prompt">
	<h5>{$message}</h5>
	<h6>{if $urlForward neq "" }<a href="{$urlForward}" style="font-weight:800;">确定</a>{/if}
	<a href="javascript:history.back();" style="font-weight:800;">返回上一页</a>
	<a href="/Admin" style="font-weight:800;">返回首页</a></h6>
</div>
{include file="Admin/footer.tpl"}