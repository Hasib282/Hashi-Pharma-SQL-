<?php 


require_once '../model/adminmodel.php';

$id = $_GET['id'];

if (deleteCustomer($id)) {
    header('Location: ../view/userlist.php');
}

 ?>