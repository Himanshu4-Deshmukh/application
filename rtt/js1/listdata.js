$(document).ready(function(){
	$(".listdata-box").each(function(){
 	var listdata=this;
		var menu=$(this).find(".navbar-nav");
	    	var len = $(listdata).find(".listdata-item").length;
	        $(menu).find("li a:not([data-filter='listdata-item'])").each(function () {
	            var cat = $(this).attr("data-filter");
	            var current_len = $(listdata).find("." + cat).length;
	            if ((current_len == len || current_len == 0) && (cat != "listdata-item" && !isEmpty(cat))) {
	                $(this).closest("li").remove();
	            }
	        });
		var list_data=[];
		$(listdata).find(".listdata-item").each(function(){
			list_data.push(this);
		});
		function categoryshowhide(){
			$(listdata).find(".category-container").each(function(){
				if($(this).find(".listdata-item.listdata-item-active").length==0){
					$(this).hide();
				}else{
					$(this).show();
				}
			});
		}
		var last_listdata_filters="listdata-item";
		$(menu).find("li").click(function(){
			var cat = $(this).find("a").attr("data-filter");
			last_listdata_filters=cat;
			if(cat=="listdata-item"){
				$(listdata).find(".listdata-item").addClass("listdata-item-active").show();
			}else{
				$(listdata).find(".listdata-item:not(."+cat+")").removeClass("listdata-item-active").hide();
				$(listdata).find(".listdata-item."+cat+"").addClass("listdata-item-active").show();
			}
			$(listdata).find(".category-container").each(function(){
				if($(this).find(".listdata-item.listdata-item-active").length==0){
					$(this).hide();
				}else{
					$(this).show();
				}
			});
		});
		$(listdata).find(".listdata-filters-search-input").keyup(function(){
			var f=$(this).val();
			var data_class="";
			var name="";
			$.each(list_data, function( index, obj ) {
				name=$(obj).find(".name").text();
				data_class=$(obj).attr("class");
				if((name.toLowerCase().indexOf(f.toLowerCase())==-1?false:true) && ((data_class.toLowerCase()).indexOf((""+last_listdata_filters).toLowerCase())==-1?false:true)) 					{
					$(obj).addClass("listdata-item-active").show();
				}else{
					$(obj).removeClass("listdata-item-active").hide();
				}
			});
			$(listdata).find(".category-container").each(function(){
				if($(this).find(".listdata-item.listdata-item-active").length==0){
					$(this).hide();
				}else{
					$(this).show();
				}
			});
		});

	});
	$(".tab-flip-switch .nav-tabs li").click(function(){
		$(".data-container").hide();
		$("#"+$(this).attr("data-id")).show();
	});
});
