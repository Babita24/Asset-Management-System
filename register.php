<?php

include ('includes/connection.php');
$id = null;
$name = null;
$email = "";
$pass = "";
$cpass = "";
$user_type ="" ;

if (isset($_GET['id']) && $_GET['id']!=null  ) {
   $id = $_GET['id'];
   $q = 'SELECT * FROM users WHERE id='.$id;
   $result = $con->query($q);

   $row = $result->fetch_assoc();
   $name = $row['name'];
   $email = $row['email'];
   $pass = $row['password'];

   $user_type = $row['user_type'];
}

if(isset($_POST['submit'])){
   $id = $_POST['id'];

   $name = mysqli_real_escape_string($con, $_POST['name']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = mysqli_real_escape_string($con, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($con, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   if($id=='' || $id==null){
   $select_users = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password not matched!';
      }else{
         mysqli_query($con, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'Registered Successfully!';
         header('location:login.php');
      }
   }
}

else {
   $q="UPDATE users SET name='".$name."', email='".$email."', password='".$pass."',  user_type='".$user_type."' WHERE `users`.`id` =".$id; 
   if($con->query($q)==TRUE){
       header('location:manage_admins.php');
   }else{
       echo $q.'####'.$con->error;
   }
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>



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
   
<div class="form-container">

   <form action="" method="post">
      <h3>Register now</h3>
      
      
      <div class="flex">
            <input type="hidden" value="<?php echo $id ?>" name="id">

      <input type="text" name="name"   value="<?php echo $name;?>" placeholder="enter your name" required class="box">
      <input type="email" name="email"  value="<?php echo $email;?>"  <?php if ($id != null) {
                           echo "disabled";
     
                        } ?> placeholder="enter your email" required class="box">
      
      <input type="password" name="password"  value="<?php echo $pass;?>"   placeholder="enter your password" required class="box">
      <input type="password" name="cpassword"  value="<?php echo $cpass;?>"  placeholder="confirm your password" required class="box">
      <select name="status" class="box">
               <option <?php if ($user_type == 'admin') {
                           echo "selected";
                        } ?> value="1">admin</option>
               <option <?php if ($user_type == 'user') {
                           echo "selected";
                        } ?> value="0">user</option>
            </select>
      <input type="submit" name="submit" value="register now" class="btn">
      <p>Already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>