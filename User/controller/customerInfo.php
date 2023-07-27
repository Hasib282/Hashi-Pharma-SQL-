<?php  

require_once ('../model/customermodel.php');

function fetchCustomer(){
	return showcustomer();
}
function fetchCustomerById($id){
	return showcustomerById($id);
}

function fetchCustomerid($info){
	return selectid($info);
}

function fetchProduct(){
	return showProduct();
}

function fetchsearchProduct($search){
	return searchProduct($search);
}

function fetchProductById($id){
	return showProductById($id);
}

function fetchProductByCategory($id){
	return showProductByCategory($id);
}

function fetchMedicine(){
	return showMedicine();
}

function fetchOrder(){
	return showOrders();
}


function fetchCartbycId($cid){
	return showCartbycId($cid);
}

function fetchOrderbyId($cid){
	return showOrdersbyId($cid);
}








?> 