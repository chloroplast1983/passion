<nav class="main_nav">
	<div class="container-fluid">
		<ul class="nav">
			<li {if $homeNavActive}class="active"{/if}><a href="/">Home</a></li>
			<li class="has-submenu {if $productNavActive}active{/if}">
				<a href="/Product">Products</a>
				<div class="sub_menu clearfix">
					<div class="menu_items">
						<div class="menu_body">
							<dl>
								<dt><a href="javascript:;" >Escalator Parts</a></dt>
								<dd><a href="javascript:;" >Wheels</a></dd>
								<dd><a href="javascript:;" >Step</a></dd>
								<dd><a href="javascript:;" >Chain</a></dd>
								<dd><a href="javascript:;" >Comb Plate</a></dd>
								<dd><a href="javascript:;" >Yellow Side</a></dd>
								<dd><a href="javascript:;" >Switch&Lock</a></dd>
							</dl>
						</div>
						<div class="menu_footer">
							<dl>
								<dt><a href="javascript:;" >Elevator Inverter</a></dt>
								<dt><a href="javascript:;" >Elevator Test Tool</a></dt>
								<dt><a href="javascript:;" >Elevator Buttons</a></dt>
							</dl>
						</div>
					</div>
					<div class="menu_items">
						<div class="menu_body">
							<dl>
								<dt><a href="javascript:;" >Elevator PCB</a></dt>
								<dd><a href="javascript:;" >OTIS</a></dd>
								<dd><a href="javascript:;" >KONE</a></dd>
								<dd><a href="javascript:;" >Mitsubishi</a></dd>
								<dd><a href="javascript:;" >Hitachi</a></dd>
								<dd><a href="javascript:;" >Thyssen</a></dd>
								<dd><a href="javascript:;" >Sigma</a></dd>
								<dd><a href="javascript:;" >Schindler</a></dd>
								<dd><a href="javascript:;" >Fujitec</a></dd>
								<dd><a href="javascript:;" >Hyunda</a></dd>
							</dl>
						</div>
						<div class="menu_footer">
							<dl>
								<dt><a href="javascript:;" >Elevator Motor</a></dt>
								<dt><a href="javascript:;" >Elevator Module</a></dt>
								<dt><a href="javascript:;" >Elevator Inverter</a></dt>
							</dl>
						</div>
					</div>
					<div class="menu_items">
						<div class="menu_body">
							<dl>
								<dt><a href="javascript:;" >Elevator Safety Parts</a></dt>
								<dd><a href="javascript:;" >Weighing Device</a></dd>
								<dd><a href="javascript:;" >Light Curtain</a></dd>
								<dd><a href="javascript:;" >Belt</a></dd>
								<dd><a href="javascript:;" >Light Curtain</a></dd>
								<dd><a href="javascript:;" >Guide Device</a></dd>
								<dd><a href="javascript:;" >Others</a></dd>
							</dl>
							<dl>
								<dt><a href="javascript:;" >Elevator Wheel</a></dt>
								<dd><a href="javascript:;" >Wheel</a></dd>
								<dd><a href="javascript:;" >Door Roller</a></dd>
							</dl>
						</div>
						<div class="menu_footer">
							<dl>
								<dt><a href="javascript:;" >Elevator Encoder</a></dt>
								<dt><a href="javascript:;" >Elevator Brakes</a></dt>
								<dt><a href="javascript:;" >Elevator Door Slider</a></dt>
							</dl>
						</div>
					</div>
					<div class="menu_items">
						<div class="menu_body">
							<dl>
								<dt><a href="javascript:;" >Elevator Guide Shoe</a></dt>
								<dd><a href="javascript:;" >Guide Shoe</a></dd>
								<dd><a href="javascript:;" >Guide Shoe Busher</a></dd>
							</dl>
							<dl>
								<dt><a href="javascript:;" >Elevator Spare Parts</a></dt>
								<dd><a href="javascript:;" >Oil Can</a></dd>
								<dd><a href="javascript:;" >Fan</a></dd>
								<dd><a href="javascript:;" >Phone</a></dd>
							</dl>
							<dl>
								<dt><a href="javascript:;" >Elevator Sensor</a></dt>
								<dd><a href="javascript:;" >Leveling Inductor</a></dd>
								<dd><a href="javascript:;" >Photoelectric Sw</a></dd>
							</dl>
						</div>
						<div class="menu_footer">
							<dl>
								<dt><a href="javascript:;" >Elevator Door Slider</a></dt>
								<dt><a href="javascript:;" >Elevator Door Vane</a></dt>
								<dt><a href="javascript:;" >Elevator COP</a></dt>
							</dl>
						</div>
					</div>
					<div class="menu_items">
						<div class="menu_body">
							<dl>
								<dt><a href="javascript:;" >Elevator Lock</a></dt>
								<dd><a href="javascript:;" >Lock Point</a></dd>
								<dd><a href="javascript:;" >Female Lock</a></dd>
								<dd><a href="javascript:;" >Door Lock</a></dd>
								<dd><a href="javascript:;" >Triangular Lock</a></dd>
							</dl>
							<dl>
								<dt><a href="javascript:;" >Elevator Electrical</a></dt>
								<dd><a href="javascript:;" >Contactors</a></dd>
								<dd><a href="javascript:;" >Relay</a></dd>
								<dd><a href="javascript:;" >Controller</a></dd>
							</dl>
						</div>
						<div class="menu_footer">
							<dl>
								<dt><a href="javascript:;" >Elevator Switch</a></dt>
							</dl>
						</div>
					</div>
				</div>
			</li>
			<li {if $productEscalatorNavActive}class="active"{/if}><a href="/Product?filter[status]=0&filter[type]=1">Escalator Parts</a></li>
			<li {if $inquiryNavActive}class="active"{/if}><a href="/Inquiry">Inquiry</a></li>
			<li {if $aboutNavActive}class="active"{/if}><a href="/About">About</a></li>
			<li {if $contactsNavActive}class="active"{/if}><a href="/Contacts">Contacts</a></li>
		</ul>
		<form class="navbar-search-form" action="/Product">
			<input type="hidden" name="filter[status]" value="0">
			<input type="text" name="filter[keyword]" class="form-control" placeholder="keywords, brands, and product items">
			<input type="submit" class="btn btn-search" value="search">
		</form>
	</div>
</nav>