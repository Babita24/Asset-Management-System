
<?php include('../includes/connection.php');?>
<?php
$id= $_POST['id'];
$category= $_POST['catid'];
$name= $_POST['name'];
$slug= $_POST['slug'];
$status= $_POST['status'];
if($id=='' || $id==null){

      $q="INSERT into subcategory ( catid, name, slug, status) values ('".$category."','".$name."','".$slug."','".$status."')";


      if($con->query($q)==TRUE){
        header('location:'.$baseURl.'manage_pages/manage_subcategories.php');
    }else{
        echo $q.'####'.$con->error;
    }
}
else{

    $q="UPDATE subcategory SET catid='".$category."', name='".$name."', slug='".$slug."', status='".$status."' WHERE `subcategory`.`id` =".$id; 
    if($con->query($q)==TRUE){
        header('location:'.$baseURl.'manage_pages/manage_subcategories.php');
    }else{
        echo $q.'####'.$con->error;
    }

}
        ?>