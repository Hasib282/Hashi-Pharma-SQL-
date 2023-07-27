<?php 

require_once '../model/adminmodel.php';

$id = $_GET['id'];

if (deleteAdmin($id)) {
    header('Location: ../view/adminlist.php');
}

 ?>