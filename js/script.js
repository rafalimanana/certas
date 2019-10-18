$(document).ready(function() {
	$('.wp-post-date').each(function () {
	    if (!$(this).text().match(/^\s*$/)) {
	    	var ptdate=$(this).text();
	    	if ((ptdate || '').split('/').length > 1) {
		    	var date = ptdate.split("/");
		    	var date2 = date[1];
		    	date2=date2.replace(/[\t\t\t]/g, "");
		    	$(this).text(date2);
		        $(this).insertBefore($(this).prev('.wp-post-title'));
	    	}
	    }
	});
})