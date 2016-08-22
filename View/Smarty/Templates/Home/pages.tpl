<ul class="pagination">
{if $multi}
	{foreach $multi $value}
		{if $value['url']}
		<li {$value['class']}><a href="{$value['url']}">{$value['html']}</a></li>
		{else}
		<li>{$value['html']}</li>
		{/if}
	{/foreach}
{/if}
</ul>