<?php  

require_once ('../model/adminmodel.php');

function fetchAdmin(){
	return showAdmin();
}
function fetchAdminById($id){
	return showAdminById($id);
}

function fetchadminid($info){
	return selectid($info);
}

function fetchCategory(){
	return showCategory();
}

function fetchManufacturer(){
	return showManufacturer();
}


function fetchProduct(){
	return showProduct();
}

function fetchProductById($id){
	return showProductById($id);
}



function fetchOrder(){
	return showOrders();
}



function fetchCustomer(){
	return showCustomer();
}

function fetchsearchProduct($search){
	return searchProduct($search);
}


function fetchsearchCustomer($search){
	return searchCustomer($search);
}

function fetchsearchAdmin($search){
	return searchAdmin($search);
}


function fetchsearchOrder($search){
	return searchOrder($search);
}

?> 