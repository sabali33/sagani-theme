const switch_tabs = (tab_selector, className) => {
	var $ = jQuery;
	if(!$(tab_selector.length)){
		return;
	}
	$(tab_selector).click(function(){
		var siblings = $(this).siblings();
		siblings.each(function(){
			$(this).removeClass(className);
			
		});
		$.each(siblings, function(key, label){

			if($(this).hasClass(className)){
				$(this).removeClass(className);
			}
		})
		$(this).addClass(className);
	});
}

