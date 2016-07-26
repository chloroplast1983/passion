(function(){

	Category = {};
	Category.selectedParentCategory = 0;
	Category.selectedCategory = 0;
	Category.ajaxGetCategoryListByTypeUrl = '/Admin/Category?filter[parentId]=0&filter[status]=0&filter[type]=';
	Category.ajaxGetCategoryListByParentUrl = '/Admin/Category?filter[status]=0&filter[parentId]=';

	Category.init = function(){
		Category.initGetCategoryListByType();
		Category.initGetCategoryListByParent();
	};

	Category.initGetCategoryListByType = function(){
		$("select.categoryType").bind("change",function(){
			Category.getCategoryListByType($(this).val());
			Category.getCategoryListByParent(0);
		});

		var typeId = $("select.categoryType").val();
		Category.getCategoryListByType(typeId);
	}

	Category.initGetCategoryListByParent = function(){
		$("select.parentCategory").bind("change",function(){
			Category.getCategoryListByParent($(this).val());
		});

		// var parentId = $("select.parentCategory").val();
		Category.getCategoryListByParent(Category.selectedParentCategory);
	}

	Category.getCategoryListByParent = function(parentId){

		$.getJSON(Category.ajaxGetCategoryListByParentUrl+parentId,function(json){
			var n = 0;
			var html = Array();

			html[n] = '<option value=\'0\'>-----</option>';
			n++;

			if(json.list!=''){
				$.each(json.list,function(key,value){

					selected = '';

					if(Category.selectedCategory == value.id){
						selected="selected='selected'";
					}

					html[n] = '<option value=\''+value.id+'\''+selected+'>'+value.name+'</option>';
					n++;
				});
			}
			html = html.join('');
			$("select.categroy").html(html);
		});
	}

	Category.getCategoryListByType = function(typeId){

		$.getJSON(Category.ajaxGetCategoryListByTypeUrl+typeId,function(json){
			var n = 0;
			var html = Array();

			html[n] = '<option value=\'0\'>-----</option>';
			n++;

			if(json.list!=''){
				$.each(json.list,function(key,value){

					selected = '';

					if(Category.selectedParentCategory == value.id){
						selected="selected='selected'";
					}

					html[n] = '<option value=\''+value.id+'\''+selected+'>'+value.name+'</option>';
					n++;
				});
			}
			html = html.join('');
			$("select.parentCategory").html(html);
		});
	}
})();	