{include file="Home/header.tpl"}
<!--Navigation-->
{include file="Home/nav.tpl"}
<!--main-->
<div class="main">
	<div class="container-fluid clearfix"><!--add-->
		<!--span只是占位符，有广告的时候直接替换就可以-->
		<!-- <a class="add" href="javascript:;"><span class="add_img">广告位置</span></a> -->
<!--aside-->
{include file="Home/leftNav.tpl"}
<!--content-->
		<div class="content">
			<div class="site_navigation">
				<span>You are here:</span><a href="/">Home</a>><span>News</span>
			</div>
			<!--News-->
			<div class="news_items">
				{if $newsList neq ""}
				{foreach $newsList as $news}
				<div class="new_item">
					<h3 class="new_title"><a href="/News/{$news->getId()}">{$news->getTitle()}</a></h3>
					<p class="new_data">{$news->getCreateTime()|date_format:"%A, %B %e, %Y"}</p>
					<div class="new_abstract">{$news->getAbstract()}</div>
				</div><!--//end item-->
				{/foreach}
				{/if}
			</div>
			<nav class="list_pagination">
				{include file="Home/pages.tpl"}
			</nav>
		</div>
	</div>
</div>
<div class="bar_40"></div>
<!--Footer-->
{include file="Home/footer.tpl"}