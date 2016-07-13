$(document).ready(function(){
	$("a.othersoff").click(function() {
		$("div#toggle").find("ul").toggle();
	});
	show_or_hide("manageNews");
	show_or_hide("manageInquiry");
	show_or_hide("manageProduct");
});

function show_or_hide(className){
	$("a."+className).bind("click",function(){
		if($("div."+className).is(":hidden")){
			$(this).find("em").removeClass("spread");
			$(this).find("em").addClass("shrink");	
			$("div."+className).slideDown("slow");
		}else{
			$(this).find("em").removeClass("shrink");
			$(this).find("em").addClass("spread");		
			$("div."+className).slideUp("slow");
		}
	});
}