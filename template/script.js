//make the tab item look active.
//parameter: i, the ith item in the tab bar
//The first one is 0.
function makeActive(i){
	var navitems=$('.nav').find('li');
	navitems.removeClass('active');
	navitems.eq(1).addClass('active');
}

