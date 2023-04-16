<?php include('../includes/connection.php');?>
<?php
$id= $_POST['id'];
$name= $_POST['name'];
$slug= $_POST['slug'];
$status= $_POST['status'];

if($id=='' || $id==null){
      $q="INSERT into category (name, slug, status) values ('".$name."','".$slug."','".$status."')";

      if($con->query($q)==TRUE){
        header('location:'.$baseURl.'manage_pages/manage_categories.php');
    }else{
        echo $q.'####'.$con->error;
    }
}
    else {
        $q="UPDATE category SET name='".$name."', slug='".$slug."',  status='".$status."' WHERE `category`.`id` =".$id; 
        if($con->query($q)==TRUE){
            header('location:'.$baseURl.'manage_pages/manage_categories.php');
        }else{
            echo $q.'####'.$con->error;
        }
    }