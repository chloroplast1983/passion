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
				<span>You are here:</span><a href="/">Home</a>><a href="/News">News</a>><span>{$news->getTitle()}</span>
			</div>
			<!--News Page-->
			<div class="new_page">
				<h3 class="new_content_title">{$news->getTitle()}</h3>
				<div class="new_info">
					<div class="new_info_bar clearfix">
						<span class="new_info_data">Published {$news->getCreateTime()|date_format:"%A, %B %e, %Y"}</span>
						<div class="new_share_items clearfix">
							<span>Share to:</span>
							<a href="javascript:;"><img src="/Global/Style/Home/images/f.png"></a>
							<a href="javascript:;"><img src="/Global/Style/Home/images/t.png"></a>
							<a href="javascript:;"><img src="/Global/Style/Home/images/in.png"></a>
							<a href="javascript:;"><img src="/Global/Style/Home/images/g.png"></a>
						</div>
					</div>
				</div>
				<div class="new_arcitle">
					{html_entity_decode($news->getContent())}
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bar_40"></div>
<!--Footer-->
{include file="Home/footer.tpl"}