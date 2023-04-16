
<?php include('../includes/connection.php');?>
<?php
$id= $_POST['id'];
$name= $_POST['name'];
$mobile= $_POST['mobile'];
$designation= $_POST['designation'];
$status= $_POST['status'];
if($id=='' || $id==null){
      $q="INSERT into distributor (  name, mobile,designation, status) values ('".$name."','".$mobile."', '".$designation."','".$status."')";

      if($con->query($q)==TRUE){
        header('location:'.$baseURl.'manage_pages/manage_distributors.php');
    }else{
        echo $q.'####'.$con->error;
    }
}
    else {
        $q="UPDATE distributor SET name='".$name."', mobile='".$mobile."',  designation='".$designation."',    status='".$status."' WHERE `distributor`.`id` =".$id; 
        if($con->query($q)==TRUE){
            header('location:'.$baseURl.'manage_pages/manage_distributors.php');
        }else{
            echo $q.'####'.$con->error;
        }
    }
    ?>