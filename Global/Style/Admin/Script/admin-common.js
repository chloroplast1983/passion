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
					$(this).find("em").removeClass("spread");
					$(this).find("em").addClass("shrink");	
					$("div."+element).slideDown("slow");
				}else{
					$(this).find("em").removeClass("shrink");
					$(this).find("em").addClass("spread");		
					$("div."+element).slideUp("slow");
				}
			});		
		});
	};

	Common.quickGuide = function(){
		$("a.othersoff").click(function() {
			$("div#toggle").find("ul").toggle();
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