<?php include('../includes/connection.php');?>
<?php
$id= $_POST['id'];
$name= $_POST['name'];
$brand_code= $_POST['brand_code'];
$logo=$_FILES['logo']['name'];
$slug= $_POST['slug'];
$status= $_POST['status'];



if($id=='' || $id==null){
  $q="INSERT into brand (name,brand_code, slug, status) values ('".$name."','".$brand_code."','".$slug."','".$status."')";


  if($con->query($q)==TRUE){
    header('location:'.$baseURl.'manage_brands.php');
}else{
    echo $q.'####'.$con->error;
}
}else{
  $q="UPDATE brand SET name='".$name."',brand_code='".$brand_code."', slug='".$slug."', status='".$status."' WHERE `brand`.`id` =".$id;
  


  if($con->query($q)==TRUE){
    header('location:'.$baseURl.'manage_pages/manage_brands.php');
}else{
    echo $q.'####'.$con->error;
}
}
header('location:'.$baseURl.'manage_pages/manage_brands.php?messege='.$messege);

      $target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["logo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["logo"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["logo"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["logo"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
    
        if($con->query($q)==TRUE){
            header('location:'.$baseURl.'manage_pages/manage_brands.php');
        }else{
            echo $q.'####'.$con->error;
        }

        


        ?>