<?php include('../includes/connection.php');?>
<?php
$id= $_POST['id'];
$name= $_POST['asset_id'];
$quantity= $_POST['quantity'];
$location= $_POST['location'];
$status= $_POST['status'];

if($id=='' || $id==null){
      $q="INSERT into assetcount (name, quantity, location, status) values ('".$name."','".$quantity."', '".$location."','".$status."')";

      if($con->query($q)==TRUE){
        header('location:'.$baseURl.'manage_pages/manage_assetcount.php?asset_id='.$name);
    }else{
        echo $q.'####'.$con->error;
    }
}
    else {
        $q="UPDATE assetcount SET  quantity='".$quantity."', location='".$location."',  status='".$status."' WHERE `assetcount`.`id` =".$id; 
        if($con->query($q)==TRUE){
            header('location:'.$baseURl.'manage_pages/manage_assetcount.php?asset_id='.$name);
        }else{
            echo $q.'####'.$con->error;
        }
    }

