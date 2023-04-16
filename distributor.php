<?php include('../includes/connection.php');?>
<?php include('../includes/admin_header.php');
$id = null;
$name = null;
$mobile = "";
$designation = "";
$status ="" ;



if (isset($_GET['id']) && $_GET['id']!=null  ) {
   $id = $_GET['id'];
   $q = 'SELECT * FROM distributor WHERE id='.$id;
   $result = $con->query($q);

   $row = $result->fetch_assoc();
   $name = $row['name'];
   $mobile = $row['mobile'];
   $designation= $row['designation'];
   $status = $row['status'];
}
?>
<body>
<section class="distributor">
   <form action="<?php echo $baseURl?>submit_pages/submit_distributor.php" method="POST">
      <h3>Distributor Form</h3>
      
       
      <div class="flex">
            <input type="hidden" value="<?php echo $id ?>" name="id">

         <div class="inputBox">
            <span>Name:</span>
            <input type="text" name="name"  value="<?php echo $name;?>" required placeholder="Enter Distributor Name">
         </div>
        
        
         <div class="inputBox">
            <span>Contact:</span>
            <input type="number" name="mobile"  value="<?php echo $mobile;?>" required placeholder="Enter mobile number">
         </div>
         <div class="inputBox">
            <span>Designation:</span>
            <input type="text"  name="designation" value="<?php echo $designation;?>"  required placeholder="e.g. HR">
         </div>
         
       
         <div class="inputBox">
            <span>Status:</span>
            <select name="status" class="box">
               <option <?php if ($status == 1) {
                           echo "selected";
                        } ?> value="1">status true</option>
               <option <?php if ($status == 0) {
                           echo "selected";
                        } ?> value="0">status false</option>
            </select>
            
         </div>
      </div>
      <center><button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
         </div>
   </form>
</section>
</body>

<?php include('../includes/footer.php');?>