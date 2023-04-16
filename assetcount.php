<?php include('../includes/admin_header.php');?>
<?php include('../includes/connection.php');
$id = null;
$name = null;
$quantity = "";
$location = "";
$status ="" ;
$assetName="";
$q56="SELECT name from assets WHERE id=".$_GET['asset_id'];
$result56 = $con->query($q56);
$row56 = $result56->fetch_assoc();
$asset_name = $row56['name'];

$q_location= "select * from assets where status = 1 ";
$result4 =$con-> query($q_location);


if (isset($_GET['id']) && $_GET['id']!=null  ) {
   $id = $_GET['id'];
   $q = 'SELECT * FROM assetcount WHERE id='.$id;
   $result = $con->query($q);

   $row = $result->fetch_assoc();
   $name = $row['name'];
   $quantity = $row['quantity'];
   $description = $row['description'];
   $location = $row['location'];
   $status = $row['status'];
}
?>
<body>
<div class="form-container">

   <form action="<?php echo $baseURl?>submit_pages/submit_assetcount.php" method="post">
      <h3>asset count Form</h3>
      <div class="flex">
            <input type="hidden" value="<?php echo $id ?>" name="id">
            <input type="hidden" value="<?php echo $_GET['asset_id']?>" name="asset_id">
      <input type="text" name="name"  value="<?php echo $asset_name;?>" placeholder="Asset Name" required  disabled class="box">
 <input type="text" name="quantity"  value="<?php echo $quantity;?>" placeholder="Quantity" required class="box">
 
  <textarea rows="5" cols="33"  placeholder="Description" required class="box" style = "resize:none"><?php echo $description;?></textarea>

 
              
                        
 <div class="inputBox">
              
              <select name="location"   value="<?php echo $location; ?>" class="box" required>
                 <option> Select Location</option>
                 <?php 
                 $selected='';
                 while($row = $result4->fetch_assoc()) {
                    if($location==$row['id']){
                       $selected='selected';
                    }else{
                       $selected='';
                    }
                    echo "<option value=".$row['id']."  ".$selected.">".$row['location']."</option>";
                  }?>
              </select>
                  </div>

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


