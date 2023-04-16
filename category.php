<?php include('../includes/admin_header.php');?>
<?php include('../includes/connection.php');
$id = null;
$name = null;
$slug = "";
$status ="" ;

if (isset($_GET['id']) && $_GET['id']!=null  ) {
   $id = $_GET['id'];
   $q = 'SELECT * FROM category WHERE id='.$id;
   $result = $con->query($q);

   $row = $result->fetch_assoc();
   $name = $row['name'];
   $slug = $row['slug'];
   $status = $row['status'];
}
?>
<body>
<div class="form-container">

   <form action="<?php echo $baseURl?>submit_pages/submit_category.php" method="post">
      <h3>Category Form</h3>
      <div class="flex">
            <input type="hidden" value="<?php echo $id ?>" name="id">
      <input type="text" name="name"  value="<?php echo $name;?>" placeholder="Category Name" required class="box">
 <input type="text" name="slug"  value="<?php echo $slug;?>" placeholder="Slug" required class="box">

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

<?php include('../includes/footer.php');?>


