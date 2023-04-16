<?php
$id=$_REQUEST['id'];
 include('../includes/connection.php');
$id=$_REQUEST['id'];
$status= $_REQUEST['status'];
$new_id=0;


$q="SELECT status FROM assetcount WHERE id='$id'";
if($status==1){
	$new_id=0;

}
elseif($status==0){
	$new_id=1;
}

$result = $con->query($query);

?>


