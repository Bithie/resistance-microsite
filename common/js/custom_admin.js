$(document).ready(function() {
	$('#agenttable').tablesorter({
        sortList: [[0,0]],
		widgets: ['zebra'],
		headers: { 
			8: {sorter: false}
		}
        		
    });  
    
});

