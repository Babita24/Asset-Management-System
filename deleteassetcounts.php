<?php 
include('../includes/connection.php');
$q='DELETE from assetcount WHERE id='.$_GET['id'];
$con->query($q);
header('location:'.$baseURl.'manage_pages/manage_assetcount.php?asset_id='.$_GET['asset_id']);
?>
