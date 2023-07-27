<?php 

require_once '../model/customermodel.php';

if (deleteCustomer($_GET['id'])) {
    session_start();
    session_destroy();
    setcookie("id", "");
    setcookie("pass", "");
    setcookie("admin", "");
    setcookie("user", "");
    setcookie("color", "");
    header('location: home.php');
}

 ?>