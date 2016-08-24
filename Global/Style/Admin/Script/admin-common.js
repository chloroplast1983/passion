(function(){

	Common = {};
	Common.sideBar = ["newsSideBar","inquirySideBar","productSideBar"];

	Common.init = function(){
		Common.sideBarInit();
		Common.deleteConfirm();
		Common.quickGuide();
	};

	Common.sideBarInit = function(){
		$.each(Common.sideBar,function(index, element){
			$("a."+element).bind("click",function(){
				if($("div."+element).is(":hidden")){
					$(this).removeClass("spread");
					$(this).addClass("shrink");
					$("div."+element).slideDown("slow");
				}else{
					$(this).removeClass("shrink");
					$(this).addClass("spread");
					$("div."+element).slideUp("slow");
				}
			});		
		});
	};

	Common.quickGuide = function(){
		$("a.othersoff").click(function() {
			$("div#toggle").slideToggle();
		});
	};

	Common.deleteConfirm = function(){
		$("a.del").bind("click",function(){
			if(confirm("确认要删除吗?")){
				return true;
			}else{
				return false;
			}
		});
	};
})();