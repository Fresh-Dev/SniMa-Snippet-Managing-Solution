var paginationElementWrapper = $('.snippets');
var paginationNavWrapper = $('#page_navigation');
var showPerPage = 5;
function changeSortBy(val)
{
    
}
function paginationChangePerPage(newVal)
{
    showPerPage=parseInt(newVal);
    initPagination();
}
$(document).ready(function(){initPagination();});
function initPagination()
{
        var show_per_page =showPerPage;
	var number_of_items = paginationElementWrapper.children().size();
	var number_of_pages = Math.ceil(number_of_items/show_per_page);
	$('#current_page').val(0);
	$('#show_per_page').val(show_per_page);
        var current_link = 0;	
        
        var navigation_html = '<div class="pagination"><ul><li><a href="javascript:pagination_prev();">Zurück</a></li>';
        while(number_of_pages > current_link)
        {
		navigation_html += '<li><a class="page_link" href="javascript:paginationGoTo(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a></li>';
		current_link++;
	}
	navigation_html += '<li><a href="javascript:pagination_next();">Weiter</a></li></ul></div>';
	
	paginationNavWrapper.html(navigation_html);	
	//add active_page class to the first page link
	$('#page_navigation .page_link:first').parent().addClass('active_page');
        
        
	
	//hide all the elements inside content div
	paginationElementWrapper.children().css('display', 'none');	
	//and show the first n (show_per_page) elements
	paginationElementWrapper.children().slice(0, show_per_page).css('display', 'block');
}



function pagination_prev(){
	
	new_page = parseInt($('#current_page').val()) - 1;
        
        var number_of_items = parseInt(paginationElementWrapper.children().size());
	var number_of_pages = parseInt(Math.ceil(number_of_items/showPerPage));
        
        if(new_page >= 0){
            paginationGoTo(new_page);
	}
	
}

function pagination_next(){
	new_page = parseInt($('#current_page').val()) + 1;
        
        var number_of_items = parseInt(paginationElementWrapper.children().size());
	var number_of_pages = parseInt(Math.ceil(number_of_items/showPerPage));
        
        
	if(number_of_pages>new_page)
        {                
		paginationGoTo(new_page);
	}
	
}
function paginationGoTo(page_num){
	//get the number of items shown per page
	var show_per_page = parseInt($('#show_per_page').val());
	
	//get the element number where to start the slice from
	start_from = page_num * show_per_page;
	
	//get the element number where to end the slice
	end_on = start_from + show_per_page;
	
	//hide all children elements of content div, get specific items and show them
	paginationElementWrapper.children().css('display', 'none').slice(start_from, end_on).css('display', 'block');
	
	$('.page_link[longdesc=' + page_num +']').parent("li").addClass('active_page').siblings('.active_page').removeClass('active_page');
	$('#current_page').val(page_num);
}