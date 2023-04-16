<?php include('../includes/connection.php');?>
<?php
$id= $_POST['id'];
$name= $_POST['name'];
$category= $_POST['category'];
$subcategory= $_POST['subcategory'];
$brand= $_POST['brand'];

$location= $_POST['location'];
$distributor= $_POST['distributorid'];
$status= $_POST['status'];

if($id=='' || $id==null){
      $q="INSERT into assets (name, catid, subcatid, brandid,  location, distributorid, status) values ('".$name."','".$category."', '".$subcategory."', '".$brand."', '".$location."', '".$distributor."','".$status."')";


        if($con->query($q)==TRUE){
            header('location:'.$baseURl.'manage_pages/manage_assets.php');
        }else{
            echo $q.'####'.$con->error;
        }
    }
        else {
            $q="UPDATE assets SET name='".$name."', catid='".$category."', subcatid='".$subcategory."', brandid='".$brand."',  location='".$location."',distributorid='".$distributor."', status='".$status."' WHERE `assets`.`id` =".$id; 
            if($con->query($q)==TRUE){
                header('location:'.$baseURl.'manage_pages/manage_assets.php');
            }else{
                echo $q.'####'.$con->error;
            }
        }

    
        ?>



  