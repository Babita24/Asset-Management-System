<?php 
include('../includes/connection.php');
$q='DELETE from distributor WHERE id='.$_GET['id'];
$con->query($q);
header('location:'.$baseURl.'manage_pages/manage_distributors.php');
?>
