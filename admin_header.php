<?php include('functions.php');
$baseURl="http://localhost/asset/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel="stylesheet" href="<?php echo $baseURl?>css/admin_style.css">
   <link rel="stylesheet" href="<?php echo $baseURl?>css/style.css">
   <link rel="stylesheet" href="<?php echo $baseURl?>css/all.min.css">
   <link rel="stylesheet" href="<?php echo $baseURl?>css/bootstrap.min.css"> 
   <link rel="stylesheet" href="<?php echo $baseURl?>css/less/mixins.less ">
   <link rel="stylesheet" href="<?php echo $baseURl?>css/fontawesome.min.css">
   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

   <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/less/form.less">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/less/mixins/vendor-prefixes.less">

 

</head>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="flex">

      <a href="<?php echo $baseURl?>index.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="<?php echo $baseURl?>index.php">Home</a>
         <a href="<?php echo $baseURl?>manage_pages/manage_assets.php">Assets</a>
         <a href="<?php echo $baseURl?>manage_pages/manage_subcategories.php">SubCategories</a>
         <a href="<?php echo $baseURl?>manage_pages/manage_categories.php">Categories</a>
         <a href="<?php echo $baseURl?>manage_pages/manage_admins.php">Admins</a>
         <a href="<?php echo $baseURl?>manage_pages/manage_brands.php">Brands</a>
         <a href="<?php echo $baseURl?>manage_pages/manage_distributors.php">Distributors</a>
         <a href="<?php echo $baseURl?>pages/searchpage.php">Search Assets</a>
         <a href="<?php echo $baseURl?>pages/searchpage2.php">Search Page</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div>new <a href="login.php">login</a> | <a href="register.php">register</a></div>
      </div>

   </div>

</header>









































