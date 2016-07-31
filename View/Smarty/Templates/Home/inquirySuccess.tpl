{include file="Home/header.tpl"}
<!--Header-->
{include file="Home/nav.tpl"}
<!--main-->
<div class="main">
	<div class="container-fluid clearfix">
		<!--add-->
		<!--span只是占位符，有广告的时候直接替换就可以-->
		<a class="add" href="javascript:;"><span class="add_img">广告位置</span></a>
<!--aside-->
{include file="Home/leftNav.tpl"}
		<!--content-->
		<div class="content">
			<!--Sent Successfully-->
			<div class="successfull_main">
				<div class="successfull_text">
					<p>Your message was sent successfully! Thanks.</p>
				</div>
				<div class="successfull_explain">
					<p>We have received your submission and will be contacting you shortly with information.<br>
						In the mean time, if you have any questions,<br>
						please contact us as <a href="javascript:;">info@passionelevator.com</a></p>
				</div>
				<p class="write_message">or feel free to write another message<a href="/Inquiry">Write another Message</a></p>
			</div>
		</div>
	</div>
</div>
<div class="bar_40"></div>
<!--Footer-->
{include file="Home/footer.tpl"}