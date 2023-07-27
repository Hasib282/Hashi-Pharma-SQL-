<?php

require_once '../model/customermodel.php';

$cid = $_REQUEST['cid'];
$pid = $_REQUEST['pid'];

deleteCart($pid,$cid);
header('location:../view/cart.php');



?>