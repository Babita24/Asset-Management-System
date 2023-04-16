<?php include('../includes/connection.php');?>
<?php include('../includes/admin_header.php');

$id = null;
$name =null;
$brand_code = "";
$logo = "";
$slug= "";
$status= "";

if (isset($_GET['id']) && $_GET['id']!=null) {
   $id = $_GET['id'];
   $q = 'SELECT * FROM brand WHERE id=' . $id;
   $result = $con->query($q);

   $row = $result->fetch_assoc();
   $name = $row['name'];
   $brand_code = $row['brand_code'];
   $logo = $row['logo'];
   $slug = $row['slug'];
   $status = $row['status'];
}
?>

<body>
   <div class="form-container">
      <form action="<?php echo $baseURl?>submit_pages/submit_brand.php" method="POST" enctype="multipart/form-data">
         <h3>Brand Form</h3>
         <div class="flex">
     
            <input type="hidden" value="<?php echo $id ?>" name="id">

            <input type="text" name="name"  value="<?php echo $name;?>" placeholder="Enter Brand name" required class="box">
            <input type="text" name="brand_code"   value="<?php echo $brand_code; ?>"  placeholder=" Enter Brand code" required class="box">
            <input type="file" name="logo"  value="<?php echo $logo; ?>" accept="image/jpg, image/jpeg, image/png" title=" CHOOSE A LOGO " class="box" required>
            <input type="text" name="slug"  value="<?php echo $slug; ?>" placeholder=" Enter Slug" required class="box">
            <select name="status" class="box">
               <option <?php if ($status == 1) {
                           echo "selected";
                        } ?> value="1">status true</option>
               <option <?php if ($status == 0) {
                           echo "selected";
                        } ?> value="0">status false</option>
            </select>
      
      <center><button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
         </div>
   </form>
   </div>
</body>

<?php include('../includes/footer.php'); ?>