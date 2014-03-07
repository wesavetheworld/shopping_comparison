$( document ).ready(function() {
	$('table').each(function() {
		// Get the table headings
	    heading = $(this).find("thead");

	    // Add css to create labels in td tags
	   	$(this).find('tr').each(function(i) {
	   		if (i == 0) {
	   			return;
	   		}

	   		$(this).find('td').each(function(j) {
	   			//alert(j);
	   			content = heading.find('th').eq(j).text();
	   			$(this).attr('data-title', content);
	   		});
	   	});
	});
});