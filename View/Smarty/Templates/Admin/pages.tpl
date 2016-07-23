{if $multi}
<p class="page">
	{foreach $multi $value}
	{if $value['url']}
	<a href="{$value['url']}"{$value['class']}>{$value['html']}</a>
	{else}
	{$value['html']}
	{/if}
	{/foreach}
</p>
{/if}