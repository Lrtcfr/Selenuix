<?php  

//$theme = false;
function index(){

	$test = find([
		'table' => 'categories'
	]);
	render();

}

function admin_index(){
    
    render();
    
}

